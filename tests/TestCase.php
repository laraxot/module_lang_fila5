<?php

declare(strict_types=1);

namespace Modules\Lang\Tests;

<<<<<<< HEAD
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Mockery\Expectation;
use Mockery\LegacyMockInterface;
use Mockery\MockInterface;
use Modules\Lang\Actions\SaveTransAction;
use Modules\Lang\Providers\LangServiceProvider;
use Modules\Xot\Contracts\UserContract;
=======
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Modules\Lang\Actions\SaveTransAction;
use Modules\Lang\Providers\LangServiceProvider;
use Modules\User\Models\User;
>>>>>>> laraxot/dev
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Tests\XotBaseTestCase;

use function Safe\file_put_contents;
<<<<<<< HEAD
use function Safe\getmypid;
use function Safe\putenv;
use function Safe\touch;
use function Safe\unlink;
use Modules\User\Models\User;

/**
 * No-op SaveTransAction per evitare scritture su lang/*.php durante i test Filament.
 */
final class SaveTransActionNoOpStub extends SaveTransAction
{
    public function execute(string $key, int|string|array|Htmlable|null $data): void {}
}
=======
use function Safe\mkdir;
>>>>>>> laraxot/dev

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
<<<<<<< HEAD
        // App riusata tra test: reset PRIMA del boot (AutoLabel gira durante parent::setUp).
        self::disablePersistTransInTests();

        parent::setUp();

        $database = database_path('fixcity_data.sqlite');
=======
        parent::setUp();

        $database = database_path('database.sqlite');
>>>>>>> laraxot/dev

        /** @var array<string, array<string, mixed>> $connections */
        $connections = config('database.connections', []);

        foreach (array_keys($connections) as $connection) {
            if (config("database.connections.{$connection}.driver") !== 'sqlite') {
                continue;
            }

            $this->app['config']->set("database.connections.{$connection}.database", $database);
            DB::purge($connection);
        }

<<<<<<< HEAD
        config(['auth.providers.users.model' => \Modules\User\Models\User::class]);

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

        Schema::connection('lang')->dropIfExists('translations');
        Schema::connection('lang')->create('translations', static function (Blueprint $table): void {
            $table->id();
            $table->string('lang')->nullable();
            $table->string('namespace')->nullable();
            $table->string('group')->nullable();
            $table->string('item')->nullable();
            $table->text('value')->nullable();
            $table->timestamps();
        });
=======
        config(['auth.providers.users.model' => User::class]);
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
     * Scrive un file di traduzione PHP nel percorso indicato.
     *
     * @param  array<string, mixed>  $translations
     */
    public static function createTranslationFile(string $filePath, array $translations): void
    {
        file_put_contents($filePath, "<?php\n\nreturn ".var_export($translations, true).";\n");
    }

    /**
=======
>>>>>>> laraxot/dev
     * @param  array<string, mixed>  $data
     */
    public function assertDatabaseHasRow(string $table, array $data, ?string $connection = null): void
    {
        $this->assertDatabaseHas($table, $data, $connection ?? 'lang');
    }

    /**
     * @param  class-string<\Throwable>  $exceptionClass
     */
    public function expectApplicationException(string $exceptionClass, ?string $message = null): void
    {
        $this->expectException($exceptionClass);
        if ($message !== null) {
            $this->expectThrowableMessage($message);
        }
    }

    /**
<<<<<<< HEAD
     * Mockery::shouldReceive() con un singolo metodo restituisce Expectation a runtime;
     * la firma nativa dichiara un'unione che PHPStan non restringe da solo.
     */
    public static function mockExpectation(LegacyMockInterface|MockInterface $mock, string $method): Expectation
    {
        /** @var Expectation $expectation */
        $expectation = $mock->shouldReceive($method);

        return $expectation;
    }

    public static function mockAllows(MockInterface $mock, string $method): Expectation
    {
        /** @var Expectation $expectation */
        $expectation = $mock->allows($method);

        return $expectation;
    }

    public static function mockExpects(MockInterface $mock, string $method): Expectation
    {
        /** @var Expectation $expectation */
        $expectation = $mock->expects($method);

        return $expectation;
=======
     * Scrive un file di traduzione PHP, creando la directory se manca.
     *
     * I test la usano per preparare un file esistente prima di verificare come
     * lo trattano le action di scrittura. Il tipo e' `array<string, string>` e
     * non un array annidato perche' tutti i chiamanti passano coppie piatte:
     * se un giorno servisse l'annidamento, si allarga di proposito e si aggiorna
     * questo commento, invece di partire larghi e non sapere piu' cosa arriva.
     *
     * @param  array<string, string>  $data
     */
    public static function createTranslationFile(string $path, array $data): void
    {
        $directory = \dirname($path);

        if (! is_dir($directory)) {
            mkdir($directory, 0o755, true);
        }

        file_put_contents($path, '<?php'.PHP_EOL.PHP_EOL.'return '.var_export($data, true).';'.PHP_EOL);
    }

    /**
     * Registra nel container l'implementazione reale di SaveTransAction.
     *
     * Serve ai test che vogliono verificare la scrittura vera su file: senza
     * questa riga il container puo' ancora avere il mock lasciato da un test
     * precedente dello stesso processo, e l'asserzione verificherebbe il mock.
     */
    public static function bindRealSaveTransAction(): void
    {
        app()->instance(SaveTransAction::class, new SaveTransAction());
    }

    /**
     * Rimuove l'override di SaveTransAction dal container.
     *
     * Si chiamava `restoreSaveTransActionNoOp()`, ma il nome descriveva un
     * meccanismo che non e' mai esistito: nessun bootstrap registra una versione
     * no-op da ripristinare. Quello che i test fanno davvero, nel `finally`, e'
     * togliere l'istanza forzata da {@see bindRealSaveTransAction()} perche' il
     * test successivo riparta dalla risoluzione normale.
     */
    public static function forgetSaveTransActionOverride(): void
    {
        app()->forgetInstance(SaveTransAction::class);
>>>>>>> laraxot/dev
    }
}
