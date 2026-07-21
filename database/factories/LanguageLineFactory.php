<?php

namespace Modules\Lang\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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

