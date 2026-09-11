<?php

declare(strict_types=1);

<<<<<<< HEAD
/*
 * Bootstrap Pest — modulo Lang.
 *
 * Questo file NON viene caricato. `Pest\Bootstrappers\BootFiles` legge `Pest.php`,
 * `Helpers.php` ed `Expectations.php` da un solo percorso per run — quello della root —
 * quindi ogni funzione dichiarata qui è codice morto e i test che la chiamano falliscono
 * con `Call to undefined function`.
 *
 * Regole, non negoziabili:
 * - zero funzioni libere qui dentro (`grep -c '^function ' ` deve dare 0);
 * - helper condivisi: metodi statici su `Modules\Xot\Tests\XotBasePest` (autoload PSR-4,
 *   niente `require_once`);
 * - helper di dominio: metodi statici su `Modules\Lang\Tests\TestCase`;
 * - ogni file di test dichiara `uses(\Modules\Lang\Tests\TestCase::class)` in testa —
 *   un `uses()->in(...)` scritto qui non verrebbe applicato;
 * - `pest()->extend(TestCase::class)->in(...)` e' la forma consigliata (il divieto
 *   storico per `method.internalClass` e' decaduto con pest-plugin-phpstan, story
 *   XOT-5.41); vincolo XOR con gli `uses()` per-file (`TestCaseAlreadyInUse`):
 *   migrare per directory, non mescolare;
 * - vietata la cartella `tests/Support/` (ADR-002).
 */
=======
use Illuminate\Support\Facades\DB;
use Modules\Lang\Database\Factories\TranslationFactory;
use Modules\Lang\Models\Translation;
use PHPUnit\Framework\Assert;

use function Safe\file_put_contents;
use function Safe\unlink;

/*
 * Bootstrap Pest — modulo Lang.
 * Ogni file test dichiara uses(\Modules\Lang\Tests\TestCase::class) se serve binding.
 * Per estendere si usa l'API idiomatica di Pest — `pest()->extend(...)`, in fondo
 * a questo file — senza nessuna annotazione di soppressione: con
 * `pestphp/pest-plugin-phpstan 5.2.0` installato, `method.internalClass` non
 * viene piu' segnalato. Misurato il 2026-08-25 su tutti i bootstrap dei moduli:
 * `phpstan analyse Modules/<Modulo>/tests/Pest.php` = 0 errori.
 * Se ricomparisse, verificare che il plugin sia ancora caricato da
 * `phpstan/extension-installer`, non reintrodurre il divieto.
 * Vedi story XOT-5.41 e ROOT-17.6.
 */

/**
 * @param  array<string, mixed>  $attributes
 */
function createTranslation(array $attributes = []): Translation
{
    return TranslationFactory::new()->createOne($attributes);
}

/**
 * @param  array<string, mixed>  $attributes
 */
function makeTranslation(array $attributes = []): Translation
{
    $translation = TranslationFactory::new()->make($attributes);
    if (! $translation instanceof Translation) {
        throw new InvalidArgumentException('Expected Translation model from factory make().');
    }

    return $translation;
}

/**
 * @param  array<string, mixed>  $translations
 */
function createTranslationFile(string $filePath, array $translations): void
{
    $phpContent = "<?php\n\nreturn ".var_export($translations, true).";\n";
    file_put_contents($filePath, $phpContent);
}

function cleanupTranslationFile(string $filePath): void
{
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}
/**
 * @param  array<string, mixed>  $data
 */
function langAssertDatabaseHasRow(string $table, array $data, ?string $connection = 'lang'): void
{
    $query = DB::connection($connection)->table($table);

    foreach ($data as $column => $value) {
        $query->where((string) $column, $value);
    }

    Assert::assertTrue($query->exists());
}
>>>>>>> laraxot/dev
