---
title: "Quality and coverage contract: Lang"
module: "Lang"
type: concept
tags: [coverage, phpstan, pest, quality]
created: 2026-07-14
updated: 2026-09-04
qmd: "lang phpstan pest coverage semantic tests"
related:
  - "./stories/"
---

# Quality and coverage contract: Lang

## PHPStan Level 10 - Phase 2

Session: Systematic module-by-module fixes (ascending error count).

- Baseline: 1 error (class.notFound in TestCase.php line 72)
- Fix: Qualified `Modules\User\Models\User::class` reference to resolve namespace ambiguity
- Result: **[OK] No errors**
- Commit: `8afed351` - phpstan L10 - resolved namespace conflict in TestCase (1 error)

## Reproducible gate

```bash
cd laravel
./vendor/bin/phpstan analyse Modules/Lang --level=10 --no-progress
./vendor/bin/pest Modules/Lang/tests --no-coverage
```
