---
bmad: true
module: Lang
version: 2026-10-06
status: organized
docs_path: docs/
archive_path: docs-archive-2026/
---

# Lang Module — Documentation Index

BMAD-compliant docs for Laravel localization.

## Sections
- `bmad/` — architecture, decisions, stories
- `wiki/` — reference, how-to, rules
- `stories/` — sprint stories
- `stories/2026-10-06-phpstan-cleanup-lang.story.md` / `.dev.md` — cleanup PHPStan (script di audit, stub di test, `TranslationStatusEnum`)

## Script PHP tracciati

`docs/italian-text-validation-refined.php` e `docs-archive-2026/*-audit-script.php` sono script CLI standalone di
audit i18n (non fanno parte del runtime Laravel). Sono corretti sul posto e restano eseguibili; se PHPStan li analizza
dipende da `excludePaths` in `laravel/phpstan.neon` (vedi story 2026-10-06-phpstan-cleanup-lang).
