# Archive documentazione legacy — Modulo Lang

Questo archivio conserva la documentazione storica del modulo Lang rimossa da `docs/` durante il consolidamento
(tracking: issue laraxot/module_lang_fila5#63). Obiettivo: `docs/` deve restare <= 100 file `.md` e contenere solo
documentazione canonica e corrente.

## Cosa contiene

- `root/` — i ~455 file `.md` (piu' script e file di servizio) che erano alla radice di `docs/`: report di audit,
  analisi di ridondanza, risoluzioni di conflitti git, appunti di sessione, varianti duplicate con underscore/ trattino.
  La maggior parte e' **superata** o **duplicata**; i documenti canonici equivalenti restano in `docs/`.
- `stories/` — story BMAD con stato `done`/`cancelled` o senza stato (continuation*, template obsoleti).
  Le story attive (proposed/in-progress/review/ready-for-done) restano in `docs/stories/`.
- `wiki/`, `llm-wiki/`, `bmad/`, `raw/`, `digests/`, `roadmap/`, `manuals/`, `html2pdf/`, `integration/`,
  `_integration/`, `cursor/`, `windsurf/`, `github/`, `.github/`, `graphify/`, `outputs/`, `logs/`,
  `root-md-files/`, `investigation/`, `fixes/`, `bugfix/`, `epics/`, `conflicts/`, `prompts/`, `templates/`,
  `ecc/`, `development/`, `filament/`, `packages/`, `performance/`, `schema/`, `translations/`, `core/`, `frontend/`
  — alberi di documentazione generata, snapshot e materiale non piu' manutenuto.

## Decisione su docs/wiki + docs/llm-wiki

La coppia `docs/wiki/` (310 file) e `docs/llm-wiki/` (7 file) e' stata **archiviata insieme**.
Motivazione: la wiki operativa del progetto vive in `bashscripts/ai/wiki/` e nella wiki condivisa
(`docs/wiki/` alla root del monorepo), indicizzata da qmd come collezione `trade-fila5-wiki`; la copia dentro il
modulo era un mirror disallineato e non referenziata da codice o configurazione (verificato con grep su
`app/`, `tests/`, `composer.json`, `phpstan.neon`). QMD indicizza `Modules/*/docs/**/*.md`: i file archiviati
non sono piu' nel corpus, coerentemente con la loro obsolescenza. I riferimenti `@see` nel codice che puntavano
a `docs/wiki/...` sono stati aggiornati dove toccati.

## Regole

- Niente file `.md` nuovi in questa cartella: e' archivio in sola lettura.
- I link interni dei documenti mantenuti che puntavano a file archiviati sono stati riscritti verso
  `archive/docs-legacy/...` (percorso relativo da `docs/`).
- Per recuperare un documento: cercare il nome file qui dentro; il contenuto e' identico a quello che era in
  `docs/` al momento dell'archiviazione (git history del repo `laraxot/module_lang_fila5`).
