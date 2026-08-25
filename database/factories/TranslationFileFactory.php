<?php

declare(strict_types=1);

namespace Modules\Lang\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Lang\Models\TranslationFile;

/**
 * @extends Factory<TranslationFile>
 */
class TranslationFileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
    *
=======
     *
>>>>>>> laraxot/dev
     * @var class-string<TranslationFile>
     */
    protected $model = TranslationFile::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
    *
=======
     *
>>>>>>> laraxot/dev
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }
}
