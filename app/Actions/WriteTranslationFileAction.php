<?php

declare(strict_types=1);

namespace Modules\Lang\Actions;

use Illuminate\Support\Facades\File;
use function Safe\exec;
use function Safe\file_put_contents;
use function Safe\tempnam;
use function Safe\unlink;
use Spatie\QueueableAction\QueueableAction;

class WriteTranslationFileAction
{
    use QueueableAction;

    /**
     * Scrive il contenuto in un file di traduzione con backup automatico.
     *
     * @param string               $filePath     Percorso del file di traduzione
     * @param array<string, mixed> $translations Traduzioni da scrivere
     *
     * @return bool True se il file è stato scritto con successo
     */
    public function execute(string $filePath, array $translations): bool
    {
        $this->assertSafeTranslationPath($filePath);

        // Crea backup del file esistente
        $this->createBackup($filePath);

        // Converte le traduzioni in formato PHP
        $readAction = app(ReadTranslationFileAction::class);
        $phpContent = $readAction->toPhp($translations);

        // Verifica la sintassi PHP prima di scrivere
        $this->validatePhpSyntax($phpContent);

        // Scrivi il file
        $result = File::put($filePath, $phpContent);

        if (false === $result) {
            throw new \Exception("Impossibile scrivere il file: {$filePath}");
        }

        // Pulisci la cache delle traduzioni
        $this->clearTranslationCache();

        return true;
    }

    /**
     * Crea un backup del file di traduzione.
     *
     * @param string $filePath Percorso del file
     */
    private function createBackup(string $filePath): void
    {
        if (! file_exists($filePath)) {
            return;
        }

        $backupDir = storage_path('app/backups/translations');
        $backupPath = $backupDir.'/'.date('Y-m-d_H-i-s').'_'.basename($filePath);

        // Crea la directory di backup se non esiste
        if (! File::exists($backupDir)) {
            File::makeDirectory($backupDir, 0o755, true);
        }

        // Copia il file
        File::copy($filePath, $backupPath);
    }

    /**
     * Valida la sintassi PHP del contenuto.
     *
     * @param string $phpContent Contenuto PHP da validare
     *
     * @throws \Exception Se la sintassi PHP non è valida
     */
    private function validatePhpSyntax(string $phpContent): void
    {
        try {
            $tokens = token_get_all($phpContent, TOKEN_PARSE);
            if ([] === $tokens) {
                throw new \ParseError('Contenuto PHP vuoto');
            }
        } catch (\ParseError $parseError) {
            throw new \Exception('Sintassi PHP non valida: '.$parseError->getMessage(), 0, $parseError);
        }
    }

    private function assertSafeTranslationPath(string $filePath): void
    {
        $normalized = str_replace('\\', '/', $filePath);
        if (! str_contains($normalized, '/Modules/') || ! str_contains($normalized, '/lang/')) {
            throw new \InvalidArgumentException("Path traduzione non consentito: {$filePath}");
        }

        $directory = dirname($filePath);

        try {
            $modulesRoot = realpath(base_path('Modules'));
            $resolvedDirectory = realpath($directory);
        } catch (\Throwable) {
            throw new \InvalidArgumentException("Path traduzione non consentito: {$filePath}");
        }

        if (! str_starts_with($resolvedDirectory, $modulesRoot)) {
            throw new \InvalidArgumentException("Path traduzione non consentito: {$filePath}");
        }
    }

    /**
     * Pulisce la cache delle traduzioni.
     */
    private function clearTranslationCache(): void
    {
        app('translator')->setLoaded([]);
    }
}
