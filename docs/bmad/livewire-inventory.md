---
title: "Inventario Lang — Livewire HTTP → widget"
type: inventory
module: Lang
status: approved
related:
  - ./livewire-widget-prd.md
  - ./livewire-widget-architecture.md
  - ./livewire-widget-tech-spec.md
  - ./livewire-widget-epics.md
  - ../../Xot/docs/bmad/livewire-widget-project-context.md
  - ../stories/12.1.retire-lang-http-switchers.story.md
---

# Inventario: Livewire HTTP → Filament (Lang)

**Solo documentazione. Nessun PHP convertito in questa sessione.**

Questa versione sostituisce la precedente del 2026-09-21, che era corretta nel verdetto finale (ritirare i due Livewire HTTP, tenere il widget) ma incompleta su due punti verificabili nel codice: dove `Change` viene effettivamente montato oggi, e se il widget che dovrebbe sostituirlo sia davvero già agganciato da qualche parte. Non lo è. Sotto ci sono le citazioni file:riga per ogni affermazione.

## Metodo

Comandi usati per verificare, non per assumere:

```bash
find Modules/Lang/app/Http/Livewire -name '*.php'
find Modules/Lang/app/Filament/Widgets -name '*.php'
grep -rn "lang\.\(switcher\|change\)" --include="*.php" --include="*.blade.php" Modules/
grep -rln "LanguageSwitcherWidget::class\|LanguageSwitcherWidget()" Modules/ Themes/
grep -rln "lang\.change\|lang\.switcher\|LanguageSwitcherWidget\|Lang\\\\Http\\\\Livewire" Modules/*/app/Providers/Filament/*.php
cat Modules/Lang/app/Http/Livewire/_components.json
```

## Le tre classi in gioco

### 1. `Http\Livewire\Lang\Switcher` (Modules/Lang/app/Http/Livewire/Lang/Switcher.php)

Componente Livewire che in `mount()` (righe 30-54) legge `app()->getLocale()`, recupera `LaravelLocalization::getSupportedLocales()` e costruisce, per ogni lingua diversa da quella corrente, l'URL localizzato tramite `LaravelLocalization::getLocalizedURL()`. Il metodo `switchLang()` è commentato (righe 56-61): la classe non esegue nessuna azione, produce solo una lista di link. Il `render()` (righe 63-75) punta sempre alla vista `lang::livewire.lang.change` (riga 66) — non a una vista propria `lang.switcher`.

L'alias Livewire `lang.switcher` risulta registrato nella cache `Modules/Lang/app/Http/Livewire/_components.json` (`{"name":"lang.switcher","class":"Lang\\Switcher","ns":"Modules\\Lang\\Http\\Livewire\\Lang\\Switcher"}`), quindi la classe è tecnicamente invocabile con `<livewire:lang.switcher>` o `@livewire('lang.switcher')`. Ma un grep sull'intero repository per `lang.switcher` (blade, php, routes) non trova nessuna occorrenza al di fuori della definizione stessa e della voce di cache. Nessun blade, nessun render hook di pannello, nessuna rotta la invoca. È codice orfano: registrato ma senza nessun chiamante.

### 2. `Http\Livewire\Lang\Change` (Modules/Lang/app/Http/Livewire/Lang/Change.php)

Stessa identica logica di `Switcher`: `mount()` alle righe 30-57 è una copia quasi carattere per carattere (stessa chiamata a `LaravelLocalization`, stesso `Arr::map`, persino lo stesso commento `// Recupera la URL localizzata corrente` che manca solo nella variante `Switcher`). Anche qui `switchLang()` è commentato (righe 59-64) e `render()` (righe 66-78) punta alla stessa vista `lang::livewire.lang.change` (riga 69).

A differenza di `Switcher`, però, `Change` **ha un chiamante reale**: `Modules/UI/resources/views/components/headernav/simple.blade.php:60` contiene `<livewire:lang.change></livewire:lang.change>`, non commentato, dentro il blocco "Right Menu" dell'header del tema frontoffice. È lo switcher lingua che compare nell'intestazione del sito pubblico quando questo blocco headernav è quello attivo. Lo stesso tag compare — ma commentato con `{{--`, quindi inattivo — in due file gemelli del modulo Cms: `Modules/Cms/resources/views/components/headernav/simple.blade.php:43` e `Modules/Cms/resources/views/components/blocks/headernav/simple.blade.php:43`.

Va detto con chiarezza, perché il documento precedente non lo diceva: **questo non è un render hook di un `*PanelProvider`**. Un grep su tutti i `Modules/*/app/Providers/Filament/*.php` del repository per `lang.change`, `lang.switcher`, `LanguageSwitcherWidget` o `Lang\Http\Livewire` non produce nessun risultato. Non esiste, in nessun modulo, un hook tipo `panels::...->before` o `->after` che monti un componente Lang nel chrome di un pannello Filament. Il montaggio di `Change` è un tag Blade diretto dentro una vista di tema frontoffice (UI/Cms), non un hook di pannello admin. Per questo `Change` non è un candidato Cluster A in senso stretto (nessun hook da spostare su un pannello): il suo consumatore è già il tema pubblico.

### 3. `Filament\Widgets\LanguageSwitcherWidget` (Modules/Lang/app/Filament/Widgets/LanguageSwitcherWidget.php)

Widget Filament reale, estende `XotBaseSchemaWidget` (riga 17), ha una propria vista `lang::filament.widgets.language-switcher` (riga 20, file `Modules/Lang/resources/views/filament/widgets/language-switcher.blade.php`) ed è testato via `Livewire::test(LanguageSwitcherWidget::class)` in `Modules/Lang/tests/Unit/LangHundredPercentCoverageTest.php:702-707`. Fin qui coincide con quanto diceva il documento precedente.

Quello che il documento precedente non verificava è se questo widget sia effettivamente montato da qualche parte oggi. Non lo è: lo stesso grep sui `*PanelProvider.php` di cui sopra è vuoto anche per `LanguageSwitcherWidget`, e un grep più ampio su `LanguageSwitcherWidget::class` / `new LanguageSwitcherWidget()` in tutto `Modules/` e `Themes/` trova solo i due file di test citati sopra e la classe wrapper del punto 4. Nessun `getWidgets()` di nessun pannello lo elenca, nessuna vista lo invoca con `@livewire(...)`. Il widget esiste, compila, ha un test, ma oggi non è agganciato in nessun punto vivo dell'applicazione.

C'è inoltre un salto funzionale reale rispetto a `Change`/`Switcher`, non solo un salto di collegamento. `getAvailableLocales()` (righe 57-64) non chiama affatto `LaravelLocalization::getSupportedLocales()`: ritorna un fallback statico di tre lingue fisse (`it`, `en`, `de` — righe 128-150), con un commento esplicito `// TODO: Implementare modello Language se necessario`. `changeLanguage()` (righe 73-82) cambia lingua impostando `session(['locale' => $locale])` e `app()->setLocale($locale)`, poi fa redirect sull'URL corrente — un meccanismo a sessione, diverso dai link diretti a URL pre-localizzati che produce `Change`. E `getLanguageUrl()` (righe 91-107) costruisce l'URL con sostituzioni di stringa manuali sul path corrente, senza passare da `LaravelLocalization::getLocalizedURL()`. Se il progetto usa `LaravelLocalization` con locali diverse da it/en/de, o con regole di prefisso URL non banali (es. `hideDefaultLocaleInURL`), il widget oggi produrrebbe un comportamento diverso da quello che il tema frontoffice ha adesso tramite `Change`. Questo gap era già segnalato in modo generico in `livewire-widget-prd.md` (FR-L003) e in `livewire-widget-tech-spec.md`, ma senza citazioni: qui sono le righe esatte.

### 4. `View\Components\LanguageSwitcher` (Modules/Lang/app/View/Components/LanguageSwitcher.php)

Il documento precedente diceva che il widget è "già wrappato" da questa classe, presentandolo come il canale con cui il widget arriva nei temi. La classe esiste davvero (riga 16), nel costruttore istanzia `LanguageSwitcherWidget` (righe 26-29) e in `render()` (righe 34-54) espone i suoi dati a una vista Blade `lang::components.language-switcher`. Il suo stesso docblock dice "Wrappa il LanguageSwitcherWidget per l'uso nei temi tramite sintassi Blade" (riga 14).

Ma la registrazione che la renderebbe disponibile come tag Blade è commentata: `Modules/Lang/app/Providers/LangServiceProvider.php:42` ha `// BladeService::registerComponents($this->module_dir.'/../View/Components', 'Modules\\Lang');`. Senza quella chiamata attiva nel `boot()`, non esiste nessun `<x-lang::language-switcher>` risolvibile: la classe è raggiungibile solo istanziandola direttamente in PHP, cosa che infatti fanno solo i due file di test (`Modules/Lang/tests/Unit/LangHundredPercentCoverageTest.php:712` e `Modules/Lang/tests/Unit/LangCoverageBoostTest.php:193`). Anche la cache dei componenti Blade del modulo, `Modules/Lang/app/View/Components/_components.json`, elenca solo il componente `Flag` e non `LanguageSwitcher` — ulteriore conferma che questo wrapper non è mai stato attivato nella pipeline di discovery. È, come il widget che avvolge, codice presente ma inerte.

## Classificazione

Nessuna delle due classi Livewire trova posto in Cluster A in senso stretto: non esiste, in nessun `PanelProvider` del repository, un hook di chrome Filament da convertire. Entrambe finiscono in Cluster B, ma con una nota che il documento precedente ometteva: il gemello esiste come codice, non come collegamento vivo.

| Classe | Cluster | Gemello | Nota |
|--------|---------|---------|------|
| `Http\Livewire\Lang\Switcher` | **B** — ritiro puro | `LanguageSwitcherWidget` (non montato) | Zero chiamanti in tutto il repo (verificato via grep + `_components.json`). Cancellazione senza effetti collaterali osservabili: nessuna vista, nessun hook, nessuna rotta la usa. |
| `Http\Livewire\Lang\Change` | **B** — ritiro condizionato | `LanguageSwitcherWidget` (non montato, comportamento non equivalente) | Montata attivamente in `Modules/UI/resources/views/components/headernav/simple.blade.php:60`. Il ritiro richiede prima di sostituire quel tag con l'invocazione del widget (`@livewire(LanguageSwitcherWidget::class)` o equivalente), e prima ancora chiudere il gap di `getAvailableLocales()`/`getLanguageUrl()` rispetto a `LaravelLocalization`. Ritirare `Change` senza questi due passi toglierebbe lo switcher lingua dall'header pubblico o lo sostituirebbe con uno che si comporta diversamente. |

Non c'è nessun candidato Cluster C: nessuna delle due classi è una pagina instradata a schermo intero né un componente strutturale non di chrome — sono entrambe piccoli switcher da header, l'unica differenza è se hanno oggi un consumatore reale.

## Correzioni rispetto alla versione precedente del documento

- "già wrappato da `View\Components\LanguageSwitcher`" era impreciso: la classe wrapper esiste ma la sua registrazione Blade è commentata (`LangServiceProvider.php:42`), quindi non è raggiungibile da nessun tema oggi.
- Il verdetto "SSoT" per il widget era prematuro: il widget non è montato in nessun pannello né invocato in nessuna vista viva. È una SSoT solo nel senso "unica implementazione widget esistente", non nel senso "già in uso al posto dell'HTTP".
- Mancava la citazione del vero consumatore di `Change` (`Modules/UI/.../headernav/simple.blade.php:60`), che è quello che rende il ritiro di `Change` diverso — più delicato — dal ritiro di `Switcher`, che invece è puro codice morto.

## Prossimi passi (solo pianificazione, nessuna implementazione)

Vedi [12.1.retire-lang-http-switchers.story.md](../stories/12.1.retire-lang-http-switchers.story.md) per gli Acceptance Criteria dettagliati.
