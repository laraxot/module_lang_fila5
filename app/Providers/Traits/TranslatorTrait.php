<?php

declare(strict_types=1);

namespace Modules\Lang\Providers\Traits;

// --- services ---
use Illuminate\Translation\Translator;
use Modules\Lang\Adapters\TranslatorAdapter;

<<<<<<< .merge_file_Z8MV9h
=======

>>>>>>> .merge_file_Hfprkw
trait TranslatorTrait
{
    public function registerTranslator(): void
    {
        // Override the JSON Translator
        $this->app->extend('translator', static function (Translator $translator): TranslatorAdapter {
            $translatorService = new TranslatorAdapter($translator->getLoader(), $translator->getLocale());
            $translatorService->setFallback($translator->getFallback());

            return $translatorService;
        });
    }
}
