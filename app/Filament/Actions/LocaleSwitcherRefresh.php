<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Actions;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;

class LocaleSwitcherRefresh extends Action
=======
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\App;
use Modules\Xot\Filament\Actions\XotBaseAction;

class LocaleSwitcherRefresh extends XotBaseAction
>>>>>>> laraxot/dev
{
    public string $fullUrl = '#';

    public string $lang = '';

    protected function setUp(): void
    {
        parent::setUp();
        $languageOptions = [
            'en' => '🇬🇧 English',
            'it' => '🇮🇹 Italiano',
        ];
        $lang = session()->get('locale');
        if (! is_string($lang)) {
            $lang = 'it';
        }
        app()->setLocale($lang);
        $this->lang = app()->getLocale();
        $this->fullUrl = request()->fullUrl();
        $this->label($this->lang)
            ->schema([
                Select::make('locale')
                    ->label('Seleziona lingua')
                    ->options($languageOptions)
                    ->default($this->lang)
                    ->reactive()
                    ->required(),
            ])
<<<<<<< HEAD
            ->action(function (array $data): mixed {
                /** @var array<string, mixed> $data */
                return $this->applyLocale($data);
=======
            ->action(function (array $data) {
                /** @var array<string, mixed> $data */
                $this->applyLocale($data);

                return redirect(request()->header('Referer'));
>>>>>>> laraxot/dev
            })
            ->modalHeading('Cambia lingua')
            // ->icon('heroicon-o-language')
            ->color('gray');
    }

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
     */
    public function applyLocale(array $data): RedirectResponse|Redirector
    {
        $locale = $data['locale'] ?? 'en';
        $locale = is_string($locale) ? $locale : 'en';

        session()->put('locale', $locale);
        App::setLocale($locale);

        return redirect(request()->header('Referer'));
=======
     * Applica la lingua scelta a sessione e applicazione.
     *
     * Estratto dalla closure di `->action()` per renderlo verificabile senza montare
     * Filament ne' simulare una richiesta HTTP. La closure resta responsabile del solo
     * redirect, che e' l'unica parte che ha bisogno del contesto della richiesta.
     *
     * Il fallback a `en` copre il caso in cui il valore arrivi non-stringa: il Select lo
     * garantisce, ma `$data` e' pur sempre input e la garanzia sta qui, non nel form.
     *
     * @param  array<string, mixed>  $data
     */
    public function applyLocale(array $data): void
    {
        $locale = $data['locale'] ?? 'en';
        if (! \is_string($locale)) {
            $locale = 'en';
        }

        session()->put('locale', $locale);
        App::setLocale($locale);
>>>>>>> laraxot/dev
    }
}
