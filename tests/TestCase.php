<?php

declare(strict_types=1);

namespace Modules\Lang\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Modules\Lang\Actions\SaveTransAction;
use Modules\Lang\Providers\LangServiceProvider;
use Modules\User\Models\User;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Tests\XotBaseTestCase;

use function Safe\file_put_contents;
use function Safe\getmypid;
use function Safe\putenv;
use function Safe\touch;
use function Safe\unlink;

/**
 * No-op SaveTransAction per evitare scritture su lang/*.php durante i test Filament.
 */
final class SaveTransActionNoOpStub extends SaveTransAction
{
    public function execute(string $key, int|string|array|\Illuminate\Contracts\Support\Htmlable|null $data): void
    {
    }
}

/**
 * Base test case for Lang module.
 *
 * Uses MySQL from .env.testing.
 * All module connections are mapped by TenantServiceProvider.
 * Migrations must be run ONCE externally: php artisan migrate --env=testing
 * DatabaseTransactions handles rollback between tests.
 */
abstract class TestCase extends XotBaseTestCase
{
    use DatabaseTransactions;

    /** @var list<string> */
    protected $connectionsToTransact = ['sqlite', 'lang', 'user'];

    protected function setUp(): void
    {
        // App riusata tra test: reset PRIMA del boot (AutoLabel gira durante parent::setUp).
        self::disablePersistTransInTests();

        parent::setUp();

        $database = database_path('fixcity_data.sqlite');

        /** @var array<string, array<string, mixed>> $connections */
        $connections = config('database.connections', []);

        foreach (array_keys($connections) as $connection) {
            if ('sqlite' !== config("database.connections.{$connection}.driver")) {
                continue;
            }

            $this->app['config']->set("database.connections.{$connection}.database", $database);
            DB::purge($connection);
        }

        config(['auth.providers.users.model' => User::class]);

        self::restoreSaveTransActionNoOp();
    }

    protected function tearDown(): void
    {
        self::restoreSaveTransActionNoOp();
        parent::tearDown();
    }

    public static function bindRealSaveTransAction(): void
    {
        self::enablePersistTransInTests();
        app()->instance(SaveTransAction::class, new SaveTransAction());
    }

    public static function restoreSaveTransActionNoOp(): void
    {
        self::disablePersistTransInTests();
        if (app()->bound('config')) {
            app()->instance(SaveTransAction::class, new SaveTransActionNoOpStub());
        }
    }

    public static function enablePersistTransInTests(): void
    {
        putenv('LANG_PERSIST_TRANS_IN_TESTS=1');
        $_ENV['LANG_PERSIST_TRANS_IN_TESTS'] = '1';
        if (app()->bound('config')) {
            config(['lang.persist_trans_in_tests' => true]);
        }
    }

    public static function disablePersistTransInTests(): void
    {
        putenv('LANG_PERSIST_TRANS_IN_TESTS=0');
        $_ENV['LANG_PERSIST_TRANS_IN_TESTS'] = '0';
        if (app()->bound('config')) {
            config(['lang.persist_trans_in_tests' => false]);
        }
    }

    /**
     * Story 5.26 parallel campaign: lo sqlite condiviso va in SQLITE_BUSY con N pest.
     * Feature/Integration DB-write → skip; coverage da Unit puri.
     * Riaprire write-test quando [5.25] schema isolato per processo.
     */
    public static function langDbUnavailable(): bool
    {
        return true;
    }

    /**
     * SQLite isolato per Translation::firstOrCreate nei test Unit (niente masscity_data).
     */
    public static function forceSqliteTranslations(): void
    {
        $database = sys_get_temp_dir().'/lang_cov_'.getmypid().'_'.uniqid('', true).'.sqlite';
        if (is_file($database)) {
            unlink($database);
        }
        touch($database);

        config([
            'database.connections.lang' => [
                'driver' => 'sqlite',
                'database' => $database,
                'prefix' => '',
                'foreign_key_constraints' => false,
            ],
        ]);
        DB::purge('lang');
        DB::reconnect('lang');

        \Illuminate\Support\Facades\Schema::connection('lang')->dropIfExists('translations');
        \Illuminate\Support\Facades\Schema::connection('lang')->create('translations', static function (\Illuminate\Database\Schema\Blueprint $table): void {
            $table->id();
            $table->string('lang')->nullable();
            $table->string('namespace')->nullable();
            $table->string('group')->nullable();
            $table->string('item')->nullable();
            $table->text('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * @return array<int, class-string>
     */
    protected function getPackageProviders(Application $app): array
    {
        return [
            ...parent::getPackageProviders($app),
            UserServiceProvider::class,
            LangServiceProvider::class,
        ];
    }

    /**
     * Scrive un file di traduzione PHP nel percorso indicato.
     *
     * @param  array<string, mixed>  $translations
     */
    public static function createTranslationFile(string $filePath, array $translations): void
    {
        file_put_contents($filePath, "<?php\n\nreturn ".var_export($translations, true).";\n");
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function assertDatabaseHasRow(string $table, array $data, ?string $connection = null): void
    {
        $this->assertDatabaseHas($table, $data, $connection ?? 'lang');
    }

    /**
     * @param class-string<\Throwable> $exceptionClass
     */
    public function expectApplicationException(string $exceptionClass, ?string $message = null): void
    {
        $this->expectException($exceptionClass);
        if (null !== $message) {
            $this->expectThrowableMessage($message);
        }
    }
}
