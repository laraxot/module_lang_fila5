<?php

declare(strict_types=1);

namespace Modules\Lang\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Modules\Lang\Providers\LangServiceProvider;
use Modules\User\Models\User;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Tests\XotBaseTestCase;

use function Safe\file_put_contents;

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
    }

    /**
     * Lo sqlite condiviso non contiene per forza le tabelle del modulo Lang:
     * le migration non vengono lanciate dai test. I test DB vanno saltati, non falliti.
     */
    public static function langDbUnavailable(): bool
    {
        try {
            DB::connection('lang')->getPdo();
            $schema = DB::connection('lang')->getSchemaBuilder();

            return ! $schema->hasTable('posts') || ! $schema->hasTable('translations');
        } catch (\Throwable) {
            return true;
        }
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
     * @param array<string, mixed> $data
     */
    /**
     * Scrive un file di traduzione PHP nel percorso indicato.
     *
     * @param  array<string, mixed>  $translations
     */
    public static function createTranslationFile(string $filePath, array $translations): void
    {
        file_put_contents($filePath, "<?php\n\nreturn ".var_export($translations, true).";\n");
    }

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
