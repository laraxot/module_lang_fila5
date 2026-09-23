---
title: "Bonifica marker merge committati — Lang"
type: story
module: Lang
epic: quality
story_id: "git-status-fleet-merge-markers-lang"
status: done
track: quality/fleet
related:
  - ../../../Xot/docs/bmad/stories/merge-marker-fleet-residue.story.md
---

# git-status-fleet-merge-markers-lang

## Contesto

Il processo automatico "laraxot" ha committato marker di merge conflict non
risolti (`<<<<<<<`, `=======`, `>>>>>>>`, varianti diff3) in file docs.
Strategia canonica (story Xot `merge-marker-fleet-residue`): HEAD pulito →
`git checkout HEAD -- file`; HEAD sporco → restore blob ultimo commit pulito in
history. Tool: `bashscripts/tools/resolve-merge-markers.sh`.

## Git status iniziale

- Branch: `dev`, up to date con `laraxot/dev`, working tree clean.
- `.gitattributes`: nessun marker.

## Risultati

| Metrica | Valore |
|---|---|
| File candidati (grep marker) | 9 |
| RESTORE_HEAD | 0 |
| RESTORE_HIST | 7 |
| MANUAL / MANUAL_UNTRACKED | 0 |
| Skipped (marker solo dentro fence) | 2 |
| `git status --porcelain` post-apply | 8 (7 restored + questa story) |

Dettaglio restore:
- `docs/docs-naming-convention-fix-duplicate.md` ← `7402d521` (commits_reverted=34)
- 6 file in `docs/wiki/integrations/_da-riconciliare/` ← `dc6ea6bd` (commits_reverted=1)

Campione >5 commits (`docs-naming-convention-fix-duplicate.md`, 34 revertiti):
verificato che il blob HEAD ripulito dai soli marker è **identico** al blob
ripristinato — i 34 commit intermedi non avevano contenuto reale oltre i marker.
Nessuna perdita.

## MANUAL irrisolti

Nessuno.

## Verifica finale

- Zero marker `<<<<<<<`/`=======`/`>>>>>>>`/`|||||||` fuori dai code fence.
- Nessun commit effettuato.

## Pest

Skip: intervento solo su file documentazione (`.md`).
