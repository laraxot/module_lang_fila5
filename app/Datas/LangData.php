<?php

declare(strict_types=1);

namespace Modules\Lang\Datas;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
>>>>>>> laraxot/dev
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Classe che rappresenta i dati relativi a una lingua.
 */
class LangData extends Data
{
    /**
     * Codice identificativo della lingua.
     */
    public string $id;

    /**
     * Nome della lingua.
     */
    public string $name;

    /**
     * HTML della bandiera rappresentativa della lingua.
     */
    public string $flag;

    /**
     * URL per cambiare lingua.
     */
    public string $url;

    /**
     * Crea una collezione di dati di lingua.
     *
<<<<<<< HEAD
     * @param  Collection<int, array{id: string, name: string, flag: string, url: string}|LangData>|array<int, array{id: string, name: string, flag: string, url: string}|LangData>  $data
     * @return DataCollection<int, LangData>
     */
    public static function collection(Collection|array $data): DataCollection
=======
     * @param EloquentCollection<int, mixed>|Collection<int, mixed>|array<int, mixed> $data
     *
     * @return DataCollection<int, LangData>
     */
    public static function collection(EloquentCollection|Collection|array $data): DataCollection
>>>>>>> laraxot/dev
    {
        /** @var DataCollection<int, LangData> $collection */
        $collection = self::collect($data, DataCollection::class);

        return $collection;
    }
}
