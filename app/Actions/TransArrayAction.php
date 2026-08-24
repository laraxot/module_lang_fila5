<?php

declare(strict_types=1);

namespace Modules\Lang\Actions;

use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Spatie\QueueableAction\QueueableAction;

/**
 * Action per la traduzione di elementi di un array.
 */
class TransArrayAction
{
    use QueueableAction;

    public ?string $transKey;

    /**
     * Esegue la traduzione di un array.
     *
     * @param  array<int|string, mixed>  $array
     *
     * @return array<int|string, string>
     */
    public function execute(array $array, ?string $transKey): array
    {
        $asStrings = array_map(
            static fn (mixed $item): string => SafeStringCastAction::cast($item),
            $array,
        );
<<<<<<< .merge_file_zcXTpR
        if ($transKey === null) {
=======
        if (null === $transKey) {
>>>>>>> .merge_file_HAKobr
            return $asStrings;
        }

        $this->transKey = $transKey;

        return array_map($this->trans(...), $asStrings);
    }

    /**
     * Traduce una chiave già resa stringa (dopo SafeStringCast).
     */
    public function trans(string $item): string
    {
<<<<<<< .merge_file_zcXTpR
        if ($item === '' || $item === '0' || $this->transKey === null) {
=======
        if ('' === $item || '0' === $item || null === $this->transKey) {
>>>>>>> .merge_file_HAKobr
            return $item;
        }

        // Prima prova la traduzione diretta (array: suffisso .label)
        $key = $this->transKey.'.'.$item.'.label';
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
