---
title: "PHPStan FATAL parse TranslationEditor — verifica e handoff swarm"
type: story
module: Lang
epic: "Quality / PHPStan swarm"
status: done-verified-no-edit-needed
created: 2026-10-15
author: swarm-agent-lang
scope:
  - laravel/Modules/Lang/app/Filament/Forms/Components/TranslationEditor.php
  - laravel/Modules/Lang/app/Filament/Forms/Components/NationalFlagSelect.php
  - laravel/Modules/Lang/tests/Fixtures/TranslationEditorStub.php
  - laravel/Modules/Lang/resources/views/filament/forms/components/translation-editor.blade.php
out_of_scope:
  - laravel/Modules/Media/app/Models/Media.php
  - laravel/Modules/Tenant/database/factories/BaseModelJsonsFactory.php
  - laravel/phpstan.neon
related_prompts:
  - bashscripts/docs/prompts/11-phpstan.md
  - bashscripts/docs/prompts/46-multi-agent-module-swarm.md
  - bashscripts/docs/prompts/57-second-brain.md
  - bashscripts/docs/prompts/15-bmad.md
ground_truth: laravel/phpstan_modules_initial.json
---

# PHPStan FATAL parse su TranslationEditor — verifica e handoff

## Richiesta

Scope critico bootstrap (swarm PHPStan): il gate `phpstan analyse Modules` e'
bloccato da 3 `phpstan.parse` FATAL riportati in
`laravel/phpstan_modules_initial.json`. Owner Lang solo per:

- `Modules/Lang/app/Filament/Forms/Components/TranslationEditor.php:292`
  `Syntax error, unexpected EOF, expecting '('`

Fuori scope (solo segnalazione, nessun tocco):

- `Modules/Media/app/Models/Media.php:458` `Unterminated comment`
- `Modules/Tenant/database/factories/BaseModelJsonsFactory.php:146`
  `Syntax error, unexpected EOF, expecting ')'`

## Scopo ricostruito del componente

`TranslationEditor extends XotBaseField`: campo Filament che idrata lo stato
(array di traduzioni annidate) e genera child components ricorsivi —
`Section` + `TranslationEditor` annidato per i sotto-array, `TextInput` per le
foglie scalari. View blade dedicata
`lang::filament.forms.components.translation-editor` che rende
`$this->getChildComponents()`. Usato nei form di gestione file di traduzione;
unico chiamante censito via filename-search in scope e' il fixture di test
`Modules/Lang/tests/Fixtures/TranslationEditorStub.php`
(`extends TranslationEditor`, override `getState(): mixed` con stato forzato).
Nessun test Pest dedicato per nome file esistente in `Modules/Lang/tests/`.

## Analisi e causa radice

Il file su disco (`1575 byte`, `50 righe`, mtime `2026-10-15 08:23`) e' stato
letto **per intero**: e' sintatticamente completo e bilanciato — classe con
`setUp()` + `getDefaultChildComponents()`, tutte le graffe/parentesi chiuse,
nessuna stringa/heredoc/commento aperto, `declare(strict_types=1)` e namespace
corretti. L'errore `unexpected EOF expecting '('` a **riga 292 non e'
riproducibile**: il file ha 50 righe.

Conclusione: il report del coordinatore si riferisce a uno stato precedente
del file (versione da 292+ righe troncata a meta' espressione, oppure stato
pre-fix). Nel working tree corrente il FATAL e' **gia' risolto in avanti**:
nessuna parentesi/graffa/funzione da chiudere, nessun edit necessario.
Applicata la disciplina "rivalida l'errore prima di fixarlo": errore non
riproducibile su contenuto attuale => nessuna modifica (un edit su file sano
sarebbe scope creep non verificabile).

## Modifiche

Nessuna modifica al codice. Verifiche read-only in scope:

- `TranslationEditor.php`: lettura integrale, sintassi valida.
- `NationalFlagSelect.php`: lettura integrale, sintassi valida; l'`Internal
  error: Function strtolower stub not found in .../phpstan.phar/...` che lo
  cita e' un problema d'ambiente (phar/stubs PHPStan corrotti), non del
  codice — nessuna contromisura nel codice (vietato workaround per bug
  d'ambiente).
- `TranslationEditorStub.php`: coerente (estende il componente, forza stato
  eterogeneo come da contratto `getState(): mixed`).
- Blade `translation-editor.blade.php`: presente e banalmente valida.
- Mappa `files` del JSON: nessun altro `file_error` per Lang; nessun type
  error Lang residuo nel report.

## Verifica

- `php -l`: **non eseguibile** in questo ambiente (tool shell Daytona non
  configurato: `DAYTONA_API_KEY is not set`). Sostituito da revisione manuale
  esaustiva del file (50 righe).
- `phpstan analyse Modules/Lang/...`: **non eseguibile** (stesso motivo).
- `git log -p --follow`, `rg` chiamanti, `bashscripts/lock/*`: **non
  eseguibili** (nessuna shell). Chiamanti censiti via filename-search;
  content-grep non disponibile.
- **Raccomandazione al coordinatore**: rilanciare il gate canonico
  `cd laravel && ./vendor/bin/phpstan analyse Modules` — se il FATAL su
  TranslationEditor ricompare, il file su disco e' diverso da quello qui
  verificato (1575 byte); se sparisce, chiudere il finding come stale.

## Decisioni

- D1: nessun edit su file sintatticamente sano con errore non riproducibile.
- D2: nessun workaround per gli `Internal error ... stub not found`
  (ambiente `phpstan.phar`, N file coinvolti repo-wide): ownership ambiente,
  non dei moduli.
- D3: `phpstan.neon`, baseline, ignore: mai toccati (vincolo).
- D4: riordino massivo di `Modules/Lang/docs/` (~400 file con duplicati
  kebab/snake): **rinviato** — rename di massa durante lo swarm = rischio
  collisioni; decisione al coordinatore. Solo questa story aggiunta.

## Aperto / follow-up (non bloccanti, non FATAL)

- O1 (osservazione): `TranslationEditor` dichiara `protected string $view`,
  mentre `XotBaseField::getView()` documenta la regola Laraxot "subclasses
  must NOT declare a protected $view property" (view risolta via
  `GetViewByClassAction` + override di tema). Rimuoverla cambia il runtime:
  decisione owner Lang/Xot, mai in questo fix.
- O2 (latente): la closure `afterStateHydrated(function
  (TranslationEditor $component, $state): void ...)` ha `$state` non tipizzato
  (`mixed` sarebbe compatibile e aiuterebbe `typeCoverage.paramTypeCoverage`
  nel run full-tree). Da valutare solo con run PHPStan reale.
- O3: file spuri `Modules/Lang/app/Models/Post.php.fixed` e
  `post.php.fixed` presenti nel tree: da rimuovere/assorbire in avanti (non
  toccati qui, non sono errori PHPStan).

## Handoff ad altri owner

- **Media owner**: `Modules/Media/app/Models/Media.php:458` —
  `phpstan.parse` `Unterminated comment`. Fuori scope Lang, non letto, non
  toccato. Tipicamente blocco `/*`/`/**` mai chiuso o marker di merge
  residuo: leggere da riga ~440, chiudere il commento in avanti.
- **Tenant owner**: `Modules/Tenant/database/factories/BaseModelJsonsFactory.php:146`
  — `phpstan.parse` `Syntax error, unexpected EOF, expecting ')'`. Fuori
  scope Lang, non letto, non toccato. Tipicamente chiamata annidata non
  chiusa a fine file: leggere da riga ~120, chiudere in avanti.
- **Coordinatore/ambiente**: 27 `Internal error ... stub not found`
  (`strtolower`, `ltrim`, `is_readable`, `basename`, `random_int`,
  `pathinfo`, `is_a`, `mb_*`, `str_ends_with`, `str_starts_with`,
  `array_*`, `html_entity_decode`, `base64_encode`, `mail`, `urlencode`,
  `ucfirst`, `enum_exists`, `extension_loaded`, `SimpleXMLElement`,
  `ReflectionIntersectionType`) dentro `phpstan.phar` — phar o
  `php-8-stubs` corrotti/incoerenti con la versione PHPStan. Va risanato
  l'ambiente (reinstall/lockfile), nessun fix nei moduli. Unico file Lang
  citato: `NationalFlagSelect.php` (via `strtolower`).
