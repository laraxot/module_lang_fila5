# 🌐 Lang — italiano in UI, inglese nel codice

[![PHP](https://img.shields.io/badge/PHP-%5E8.3-777BB4.svg)](composer.json)
[![Laravel](https://img.shields.io/badge/Laravel-%5E13.0-FF2D20.svg)](composer.json)
[![Filament](https://img.shields.io/badge/Filament-%5E5.0-FDAB3D.svg)](composer.json)
[![PHPStan](https://img.shields.io/badge/PHPStan-analyse%20Modules%2FLang%3A%200%20errori-brightgreen.svg)](../../phpstan.neon)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

> Zero `->label()` hardcoded nei componenti Filament. Una chiave, tre lingue,
> un solo posto dove si decide come si chiama un campo — non venti moduli che
> se lo inventano ognuno a modo suo.

I badge sopra sono verificati, non incollati: misurati da `base-ptvx-fila5-80`
il 1 settembre 2026, dopo il ripristino di `vendor/` allo stato corretto
(330 pacchetti). Comando: `cd laravel && ./vendor/bin/phpstan analyse Modules/Lang`.

---

## Perché

Un progetto a 20 moduli, ognuno con le proprie form Filament, non può permettersi
che ogni sviluppatore scriva `->label('Nome')` a mano: la stessa label finisce
scritta in tre modi diversi, in tre lingue diverse, con tre livelli di coerenza
diversi. Lang esiste per togliere quella scelta: la label si risolve da sola,
dalla convenzione `{locale}/{module}::field.{nome_campo}.label`, e se manca non
compare un errore silenzioso in produzione — il comando `lang:validate` la trova
prima del deploy.

## Logica

`LangServiceProvider` si registra una volta e intercetta la risoluzione delle
label per ogni componente Filament del progetto: `TextInput::make('email')`
non ha bisogno di `->label()` perché il provider guarda il nome del campo, il
modulo corrente e la lingua attiva, e costruisce la chiave da solo. Le azioni
(`SyncTranslationsAction`, `ValidateTranslationsAction`, `PublishTranslationAction`)
sono la parte visibile: sincronizzano, validano e pubblicano i file `lang/`
senza che un umano li tocchi a mano modulo per modulo.

## Filosofia

**Le lingue supportate sono quelle vere, non quelle aspirazionali.** Questo file
dichiarava in una versione precedente "10+ lingue" e "Google Translate API" —
nessuna delle due esisteva nel codice: il modulo gestisce IT/EN/DE, punto, senza
traduzione automatica. Un modulo di i18n che mente sulle lingue che supporta è
il tipo di bug che si scopre in produzione, davanti a un utente, non prima.

## Religione

**I numeri si pubblicano quando sono misurati, non quando suonano bene.** La
tabella "Stato misurato" sotto viene dalla run di oggi di `base-ptvx-fila5-80`
(phpstan/phpmd/phpinsights per modulo, non a mano); il coverage percentuale
specifico non è incluso perché il comando canonico del modulo
(`Modules/Lang/docs/coverage.md`) al momento della scrittura segnalava un test
rosso — non si arrotonda un test rosso a un numero verde.

## Politica

`laravel/phpstan.neon` è sacro: nessun agente lo tocca. Ogni cifra qui sotto è
riproducibile con il comando che le sta accanto, senza flag che cambiano il
perimetro dell'analisi.

## Zen

Un modulo di traduzioni che nessuno nota è un modulo che funziona: la label
giusta appare al posto giusto, in italiano per chi clicca, in inglese nel
codice per chi legge. Non serve applausi, serve che non si rompa mai in
silenzio.

---

## Stato misurato — 1 settembre 2026

Fonte: misura di `base-ptvx-fila5-80` su `vendor/` ripristinato (330 pacchetti),
dopo `composer update -W`. Comandi riportati per riprodurre ogni riga.

| Metrica | Valore | Comando |
|---|---:|---|
| PHPStan | **0 errori** | `./vendor/bin/phpstan analyse Modules/Lang` |
| `@phpstan-ignore` | 0 | `grep -rc "@phpstan-ignore" Modules/Lang` |
| PHPMD su `app/` | 60 rilievi | `./tools/phpmd.sh Modules/Lang/app` |
| PHPInsights — Code | 94.1 % | `./tools/phpinsights.sh Modules/Lang` |
| PHPInsights — Architecture | 92.9 % | idem |
| Casi di test | 251 (secondo `docs/coverage.md`: 234 passati, 16 saltati, **1 fallito** l'ultima volta che è stato misurato) | `./vendor/bin/pest Modules/Lang` |

**Non è stato possibile rilanciare la suite di test per verificare se il test
fallito è ancora rosso**: al momento della scrittura di questo file, `vendor/`
o file `app/` di altri moduli (`Xot/helpers/Helper.php` fra gli altri)
contengono marker di conflitto Git non risolti (`<<<<<<<`) che rompono il
bootstrap dell'intera suite con un `PHP Parse error`. Non è un problema di
Lang — è un incidente in corso sul tree condiviso, segnalato separatamente.
Chi legge questo file dopo che l'incidente è chiuso: rilancia il comando sopra
e aggiorna questa riga con il numero vero, non lasciarla scritta a futura
memoria.

## Cosa contiene

- **`LangServiceProvider`** — risoluzione automatica delle label Filament da
  convenzione, cross-modulo.
- **Azioni** — `SyncTranslationsAction`, `ValidateTranslationsAction`,
  `PublishTranslationAction`, `ReadFileAction`/`WriteFileAction` per i file
  `lang/` PHP e JSON.
- **Filament** — `TranslationFileResource` (editor), `LanguageSwitcherWidget`
  (cambio lingua in admin).
- **Modelli** — `Translation`, `TranslationFile`, `Post` (contenuto
  traducibile generico).
- **Package locale** — `packages/lara-zeus/spatie-translatable`, integrazione
  Filament/Translatable, referenziato come repository path nel `composer.json`
  di root.

## Come si verifica (non fidarti di questo file)

```bash
cd laravel
./vendor/bin/phpstan analyse Modules/Lang       # 0 errori atteso
./tools/phpmd.sh Modules/Lang/app               # NON la root del modulo
./tools/phpinsights.sh Modules/Lang
./vendor/bin/pest Modules/Lang
```

## Documentazione

| | |
|---|---|
| Coverage e blocchi noti | [`docs/coverage.md`](docs/coverage.md) |
| Wiki tecnica | [`docs/`](docs/) |

---

**Modulo** `lang` · **Laraxot / FixCity Platform** · licenza MIT
