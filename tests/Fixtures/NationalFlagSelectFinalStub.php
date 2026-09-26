<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Fixtures;

use Modules\Lang\Filament\Forms\Components\NationalFlagSelect;

final class NationalFlagSelectFinalStub extends NationalFlagSelect
{
    /** @var array<int, mixed> */
    public array $forcedCountries = [];

    /** @var array<int, mixed> */
    public array $extraFilteredRows = [];

    /**
     * @return array<int, mixed>
     */
    protected function resolveCountries(): array
    {
        return $this->forcedCountries;
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_uzzdPP
     * @param  array<int, mixed>  $filteredCountries
=======
<<<<<<< .merge_file_EvvuRM
     * @param array<int, mixed> $filteredCountries
     *
=======
     * @param  array<int, mixed>  $filteredCountries
>>>>>>> .merge_file_7NTrg4
>>>>>>> .merge_file_PTnW5z
=======
     * @param  array<int, mixed>  $filteredCountries
>>>>>>> laraxot/dev
     * @return array<int, mixed>
     */
    protected function finalizeFilteredCountries(array $filteredCountries): array
    {
        return array_merge(array_values($filteredCountries), $this->extraFilteredRows);
    }
}
