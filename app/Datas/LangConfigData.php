<?php

declare(strict_types=1);

namespace Modules\Lang\Datas;

use Modules\Xot\Datas\Concerns\MakesFromTenantConfig;
use Spatie\LaravelData\Data;

/** Config tenant per la SettingPage di Lang, senza chiavi esposte al form. */
class LangConfigData extends Data
{
    use MakesFromTenantConfig;

    public bool $enabled = true;
    public string $default_locale = 'it';

    /** @var list<string> */
    public array $supported_locales = ['it', 'en'];
}
