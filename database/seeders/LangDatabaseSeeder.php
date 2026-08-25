<?php

declare(strict_types=1);

namespace Modules\Lang\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class LangDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

<<<<<<< HEAD
       $this->call([
=======
        $this->call([
>>>>>>> laraxot/dev
            LanguageLineSeeder::class,
            TranslationSeeder::class,
            PostSeeder::class,
            TranslationFileSeeder::class,
        ]);
    }
}
