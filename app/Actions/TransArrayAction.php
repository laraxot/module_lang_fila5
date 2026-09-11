<?php

declare(strict_types=1);

namespace Modules\Lang\Actions;

<<<<<<< HEAD
=======
use Illuminate\Support\Arr;
>>>>>>> laraxot/dev
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Spatie\QueueableAction\QueueableAction;

/**
<<<<<<< HEAD
 * Action per la traduzione di elementi di un array.
=======
 * Action per la traduzione di elementi di una collezione.
>>>>>>> laraxot/dev
 */
class TransArrayAction
{
    use QueueableAction;

    public ?string $transKey;

    /**
<<<<<<< HEAD
     * Esegue la traduzione di un array.
     *
     * @param  array<int|string, mixed>  $array
=======
     * Esegue la traduzione di una collezione.
     *
     * @param array<int|string, mixed> $array
     *
>>>>>>> laraxot/dev
     * @return array<int|string, string>
     */
    public function execute(array $array, ?string $transKey): array
    {
<<<<<<< HEAD
        $asStrings = array_map(
            static fn (mixed $item): string => SafeStringCastAction::cast($item),
            $array,
        );
        if ($transKey === null) {
            return $asStrings;
=======
        if (null === $transKey) {
            $result = Arr::map($array, SafeStringCastAction::cast(...));
            if (is_array($result)) {
                $stringResult = [];
                foreach ($result as $key => $value) {
                    $stringResult[$key] = is_string($value) ? $value : '';
                }

                return $stringResult;
            }

            return [];
>>>>>>> laraxot/dev
        }

        $this->transKey = $transKey;

<<<<<<< HEAD
        return array_map($this->trans(...), $asStrings);
    }

    /**
     * Traduce una chiave già resa stringa (dopo SafeStringCast).
     */
    public function trans(string $item): string
    {
        if ($item === '' || $item === '0' || $this->transKey === null) {
            return $item;
        }

        // Prima prova la traduzione diretta (array: suffisso .label)
        $key = $this->transKey.'.'.$item.'.label';
=======
        $result = Arr::map($array, $this->trans(...));
        if (is_array($result)) {
            $stringResult = [];
            foreach ($result as $key => $value) {
                $stringResult[$key] = is_string($value) ? $value : '';
            }

            return $stringResult;
        }

        return [];
    }

    /**
     * Traduce un singolo elemento.
     *
     * @param mixed $item L'elemento da tradurre
     *
     * @return string L'elemento tradotto o l'elemento originale se la traduzione non esiste
     */
    public function trans(mixed $item): string
    {
        // Converte l'item in stringa se non lo è già
        if (! \is_string($item)) {
            $item = SafeStringCastAction::cast($item);
        }

        if ('' === $item || '0' === $item || null === $this->transKey) {
            return $item;
        }

        // Prima prova la traduzione diretta
        $key = $this->transKey.'.'.$item.'.label';

>>>>>>> laraxot/dev
        $trans = trans($key);

        // Se la traduzione esiste ed è una stringa, la restituisce
        if ($trans !== $key && \is_string($trans)) {
            return $trans;
        }

        // Seconda prova: sostituisce i punti con underscore
        $itemWithUnderscore = str_replace('.', '_', $item);
        $keyWithUnderscore = $this->transKey.'.'.$itemWithUnderscore;
        $transWithUnderscore = trans($keyWithUnderscore);

        // Se la traduzione con underscore esiste ed è una stringa, la restituisce
        if ($transWithUnderscore !== $keyWithUnderscore && \is_string($transWithUnderscore)) {
            return $transWithUnderscore;
        }

        // Se nessuna traduzione è stata trovata, restituisce l'elemento originale
        return $item;
    }
}
