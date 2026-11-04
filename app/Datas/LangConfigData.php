<?php

declare(strict_types=1);

namespace Modules\Lang\Datas;

use Modules\Xot\Datas\Concerns\MakesFromTenantConfig;
use Spatie\LaravelData\Data;

/** Config tenant per la SettingPage di Lang, senza chiavi esposte al form. */
class LangConfigData extends Data
{
    use MakesFromTenantConfig;
}
