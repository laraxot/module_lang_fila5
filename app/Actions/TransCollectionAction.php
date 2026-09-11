<?php

declare(strict_types=1);

namespace Modules\Lang\Actions;

use Illuminate\Support\Collection;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Spatie\QueueableAction\QueueableAction;

/**
 * Action per la traduzione di elementi di una collezione.
 */
class TransCollectionAction
{
    use QueueableAction;

    public ?string $transKey;

    /**
     * Esegue la traduzione di una collezione.
     *
<<<<<<< HEAD
     * @param  Collection<int|string, mixed>  $collection
=======
     * @param Collection<int|string, mixed> $collection
     *
>>>>>>> laraxot/dev
     * @return Collection<int|string, string>
     */
    public function execute(Collection $collection, ?string $transKey): Collection
    {
<<<<<<< HEAD
        $asStrings = $collection->map(SafeStringCastAction::cast(...));
        if ($transKey === null) {
            return $asStrings;
=======
        if (null === $transKey) {
            return $collection->map(SafeStringCastAction::cast(...));
>>>>>>> laraxot/dev
        }

        $this->transKey = $transKey;

<<<<<<< HEAD
        return $asStrings->map($this->trans(...));
    }

    /**
     * Traduce una chiave già resa stringa (dopo SafeStringCast).
     */
    public function trans(string $item): string
    {
        if ($item === '' || $item === '0' || $this->transKey === null) {
=======
        return $collection->map($this->trans(...));
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
>>>>>>> laraxot/dev
            return $item;
        }

        // Prima prova la traduzione diretta
        $key = $this->transKey.'.'.$item;
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
