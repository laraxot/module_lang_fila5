<?php

declare(strict_types=1);

namespace Modules\Lang\Database\Seeders;

use Illuminate\Database\Seeder;

class TranslationFileSeeder extends Seeder
{
    public function run(): void
    {
        $count = TranslationFile::query()->count();

        if (null !== $this->command) {
            $this->command->info("TranslationFileSeeder: {$count} file lang indicizzati via Sushi.");
        }
    }
}
