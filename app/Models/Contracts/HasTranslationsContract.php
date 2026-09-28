<?php

declare(strict_types=1);

namespace Modules\Lang\Models\Contracts;

/**
 * Interfaccia per modelli che supportano traduzioni.
 */
interface HasTranslationsContract
{
    /**
     * Ottiene la traduzione di un attributo in una specifica lingua.
     *
<<<<<<< HEAD
     * @return string|array<string, mixed>|int|null Il valore tradotto dell'attributo, o null se non disponibile
=======
     * @return string|array<mixed>|int|null Il valore tradotto dell'attributo, o null se non disponibile
>>>>>>> laraxot/dev
     */
    public function getTranslation(string $key, string $locale, bool $useFallbackLocale = true): string|array|int|null;

    /**
     * Imposta la traduzione di un attributo in una specifica lingua.
     *
     * @return self L'istanza corrente del modello, per supportare method chaining
     */
    /**
     * Imposta la traduzione di un attributo in una specifica lingua.
     *
<<<<<<< HEAD
     * @param string                               $key    Chiave dell'attributo da tradurre
     * @param string                               $locale Lingua della traduzione
     * @param array<string, mixed>|int|string|null $value
=======
     * @param  string  $key  Chiave dell'attributo da tradurre
     * @param  string  $locale  Lingua della traduzione
     * @param  array<string, mixed>|int|string|null  $value
>>>>>>> laraxot/dev
     */
    public function setTranslation(string $key, string $locale, int|array|string|null $value): self;
}
