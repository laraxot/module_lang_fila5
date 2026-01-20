<?php

declare(strict_types=1);

namespace Modules\Lang\Tests;

use Illuminate\Foundation\Application;
<<<<<<< HEAD
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
=======
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
>>>>>>> laraxot/develop
use Modules\Lang\Providers\LangServiceProvider;
use Modules\Xot\Tests\CreatesApplication;

/**
 * Base test case for Lang module tests.
<<<<<<< HEAD
=======
 *
 * Uses SQLite shared memory database following Activity/TestCase.php pattern.
>>>>>>> laraxot/develop
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
<<<<<<< HEAD

    /**
     * Setup the test environment.
=======
    use DatabaseTransactions;

    /**
     * Setup the test environment.
     * Il sito funziona, quindi i test devono riflettere il comportamento reale.
>>>>>>> laraxot/develop
     */
    protected function setUp(): void
    {
        parent::setUp();

<<<<<<< HEAD
        // Load Lang module specific configurations
        $this->loadLaravelMigrations();

        // Seed any required data for Lang tests
        $this->artisan('module:seed', ['module' => 'Lang']);
=======
        // Usiamo SQLite shared memory seguendo pattern Activity/TestCase.php
        $dbName = 'file:memdb_lang_'.Str::random(10).'?mode=memory&cache=shared';

        $connections = [
            'sqlite',
            'mysql',
            'mariadb',
            'pgsql',
            'activity',
            'cms',
            'gdpr',
            'geo',
            'job',
            'lang',
            'media',
            'meetup',
            'notify',
            'seo',
            'tenant',
            'ui',
            'user',
            'xot',
        ];

        foreach ($connections as $conn) {
            $this->app['config']->set("database.connections.{$conn}.driver", 'sqlite');
            $this->app['config']->set("database.connections.{$conn}.database", $dbName);
        }

        foreach ($connections as $conn) {
            DB::purge($conn);
        }

        foreach ($connections as $conn) {
            try {
                $pdo = DB::connection($conn)->getPdo();
                if ($pdo instanceof \PDO && method_exists($pdo, 'sqliteCreateFunction')) {
                    $pdo->sqliteCreateFunction('md5', static fn (?string $value): ?string => null === $value ? null : md5($value));
                    $pdo->sqliteCreateFunction('unhex', static fn (?string $value): ?string => $value);
                }
            } catch (\Throwable) {
            }
        }

        $this->artisan('module:migrate', ['module' => 'Xot', '--force' => true]);
        $this->artisan('module:migrate', ['module' => 'User', '--force' => true]);
        $this->artisan('module:migrate', ['module' => 'Lang', '--force' => true]);
>>>>>>> laraxot/develop
    }

    /**
     * Get package providers.
     *
     * @param Application $app
     *
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            LangServiceProvider::class,
        ];
    }
}
