<?php

declare(strict_types=1);

namespace Modules\Lang\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\Modules\Lang\Models\LanguageLine>
 */
class LanguageLineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Lang\Models\LanguageLine::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
