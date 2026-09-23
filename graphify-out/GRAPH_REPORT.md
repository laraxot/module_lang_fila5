# Graph Report - /var/www/_bases/<nome repository>/laravel/Modules/Lang  (2026-08-04)

## Corpus Check
- cluster-only mode — file stats not available

## Summary
- 614 nodes · 817 edges · 111 communities (103 shown, 8 thin omitted)
- Extraction: 98% EXTRACTED · 2% INFERRED · 0% AMBIGUOUS · INFERRED: 17 edges (avg confidence: 0.8)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `4f8454aa`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- Spatie\QueueableAction\QueueableAction
- Modules\Xot\Contracts\UserContract
- Post
- LangServiceProvider.php
- LanguageSwitcherWidget
- devDependencies
- TestCase.php
- .languages
- EditTranslationFile
- Illuminate\Database\Seeder
- TranslationFileResource.php
- contributor-lines-report.mjs
- LangServiceProvider
- composer.json
- keywords
- ReadTranslationFileAction
- SyncTranslationsAction
- Filament\Panel
- scripts
- laravel
- require
- LangBaseViewRecord
- config
- psr-4
- Dashboard
- RouteServiceProvider
- EventServiceProvider
- autoload-dev
- consolidate.sh
- components/language-switcher.blade.php
- widgets/language-switcher.blade.php
- vite.config.js

## God Nodes (most connected - your core abstractions)
1. `Post` - 27 edges
2. `TranslationFile` - 20 edges
3. `Translation` - 18 edges
4. `LanguageSwitcherWidget` - 14 edges
5. `BaseModel` - 11 edges
6. `SyncTranslationsAction` - 10 edges
7. `LangServiceProvider` - 10 edges
8. `keywords` - 10 edges
9. `EditTranslationFile` - 9 edges
10. `PostPolicy` - 9 edges

## Surprising Connections (you probably didn't know these)
- `makeGetAllTranslationAction()` --references--> `GetAllTranslationAction`  [EXTRACTED]
  tests/Unit/Actions/GetAllTranslationActionTest.php → app/Actions/GetAllTranslationAction.php
- `makeGetTransPathAction()` --references--> `GetTransPathAction`  [EXTRACTED]
  tests/Unit/Actions/GetTransPathActionTest.php → app/Actions/GetTransPathAction.php
- `makeReadTranslationFileAction()` --references--> `ReadTranslationFileAction`  [EXTRACTED]
  tests/Unit/Actions/ReadTranslationFileActionTest.php → app/Actions/ReadTranslationFileAction.php
- `makeTransArrayAction()` --references--> `TransArrayAction`  [EXTRACTED]
  tests/Unit/Actions/TransArrayActionTest.php → app/Actions/TransArrayAction.php
- `makeTransCollectionAction()` --references--> `TransCollectionAction`  [EXTRACTED]
  tests/Unit/Actions/TransCollectionActionTest.php → app/Actions/TransCollectionAction.php

## Import Cycles
- None detected.

## Communities (111 total, 8 thin omitted)

### Community 0 - "Spatie\QueueableAction\QueueableAction"
Cohesion: 0.05
Nodes (18): GetAllModuleTranslationAction, GetAllTranslationAction, GetTransPathAction, MergeTranslationsAction, PublishTranslationAction, TransArrayAction, RecordMissingTranslationAction, TranslatorAction (+10 more)

### Community 1 - "Modules\Xot\Contracts\UserContract"
Cohesion: 0.08
Nodes (13): LangBasePolicy, TranslationFilePolicy, TranslationPolicy, Translation, TranslationFile, TranslationFactory, Illuminate\Auth\Access\HandlesAuthorization, Illuminate\Database\Eloquent\Builder (+5 more)

### Community 2 - "Post"
Cohesion: 0.07
Nodes (14): BaseMorphPivot, PostPolicy, Post, PostFactory, TranslationFileFactory, Illuminate\Database\Eloquent\Factories\Factory, Illuminate\Database\Eloquent\Relations\MorphPivot, Illuminate\Database\Eloquent\Relations\MorphTo (+6 more)

### Community 3 - "LangServiceProvider.php"
Cohesion: 0.09
Nodes (20): AutoLabelAction, LocaleSwitcherRefresh, NationalFlagSelect, TranslationEditor, LangBaseListRecords, ListTranslationFiles, TranslationFilesTable, Filament\Actions\Action (+12 more)

### Community 4 - "LanguageSwitcherWidget"
Cohesion: 0.07
Nodes (15): TranslationFileForm, TranslationFileInfolist, LanguageSwitcherWidget, Change, Switcher, Flag, LanguageSwitcher, Filament\Schemas\Components\Component (+7 more)

### Community 5 - "devDependencies"
Cohesion: 0.05
Nodes (36): autoprefixer, axios, cross-env, laravel-mix, laravel-mix-merge-manifest, laravel-vite-plugin, lodash, devDependencies (+28 more)

### Community 6 - "TestCase.php"
Cohesion: 0.09
Nodes (14): LangField, BaseModel, BaseModelLang, Illuminate\Contracts\Database\Eloquent\CastsAttributes, Illuminate\Contracts\Translation\Translator, Illuminate\Database\Eloquent\Model, Illuminate\Foundation\Application, Illuminate\Foundation\Testing\DatabaseTransactions (+6 more)

### Community 7 - ".languages"
Cohesion: 0.13
Nodes (10): TransCollectionAction, LangData, DataCollection, TranslationData, ThemeComposer, Illuminate\Database\Eloquent\Collection, Illuminate\Support\Collection, Spatie\LaravelData\Data (+2 more)

### Community 8 - "EditTranslationFile"
Cohesion: 0.11
Nodes (9): SaveTransAction, LangBaseEditRecord, EditTranslationFile, setTranslation(), getTranslation(), Illuminate\Contracts\Support\Htmlable, LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable, Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord (+1 more)

### Community 9 - "Illuminate\Database\Seeder"
Cohesion: 0.11
Nodes (8): LanguageLine, LanguageLineFactory, LangDatabaseSeeder, LanguageLineSeeder, PostSeeder, TranslationFileSeeder, TranslationSeeder, Illuminate\Database\Seeder

### Community 10 - "TranslationFileResource.php"
Cohesion: 0.14
Nodes (8): LangBaseResource, LangBaseCreateRecord, CreateTranslationFile, TranslationFileResource, LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable, LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable, Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord, Modules\Xot\Filament\Resources\XotBaseResource

### Community 11 - "contributor-lines-report.mjs"
Cohesion: 0.16
Nodes (19): args, barChartSvg(), buildHtml(), buildSummary(), clocData, collectCloc(), collectGitChurn(), cwd (+11 more)

### Community 12 - "LangServiceProvider"
Cohesion: 0.21
Nodes (7): LangServiceProvider, TranslatorTraitPhpstanProbe, Illuminate\Contracts\Foundation\Application, Modules\Lang\Providers\Traits\TranslatorTrait, Modules\Xot\Providers\XotBaseServiceProvider, makeLangServiceProvider(), makeLangServiceProvider()

### Community 13 - "composer.json"
Cohesion: 0.18
Nodes (10): authors, description, homepage, license, minimum-stability, name, prefer-stable, repositories (+2 more)

### Community 14 - "keywords"
Cohesion: 0.20
Nodes (10): keywords, filament, i18n, l10n, lang, laravel, laraxot, localization (+2 more)

### Community 17 - "Filament\Panel"
Cohesion: 0.43
Nodes (4): AdminPanelProvider, LangBasePanelProvider, Filament\Panel, Modules\Xot\Providers\Filament\XotBasePanelProvider

### Community 18 - "scripts"
Cohesion: 0.29
Nodes (7): scripts, analyse, format, post-autoload-dump, post-update-cmd, test, test-coverage

### Community 19 - "laravel"
Cohesion: 0.33
Nodes (6): extra, laravel, aliases, providers, Modules\\Lang\\Providers\\Filament\\AdminPanelProvider, Modules\\Lang\\Providers\\LangServiceProvider

### Community 20 - "require"
Cohesion: 0.33
Nodes (6): require, lara-zeus/spatie-translatable, mcamara/laravel-localization, php, rinvex/countries, spatie/laravel-sluggable

### Community 21 - "LangBaseViewRecord"
Cohesion: 0.60
Nodes (3): LangBaseViewRecord, LaraZeus\SpatieTranslatable\Resources\Pages\ViewRecord\Concerns\Translatable, Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord

### Community 22 - "config"
Cohesion: 0.40
Nodes (5): pestphp/pest-plugin, phpstan/extension-installer, config, allow-plugins, sort-packages

### Community 23 - "psr-4"
Cohesion: 0.40
Nodes (5): autoload, psr-4, Modules\\Lang\\, Modules\\Lang\\Database\\Factories\\, Modules\\Lang\\Database\\Seeders\\

### Community 24 - "Dashboard"
Cohesion: 0.67
Nodes (3): Dashboard, BackedEnum, Modules\Xot\Filament\Pages\XotBaseDashboard

### Community 27 - "autoload-dev"
Cohesion: 0.67
Nodes (3): autoload-dev, psr-4, Modules\\Lang\\Tests\\

## Knowledge Gaps
- **72 isolated node(s):** `name`, `description`, `laraxot`, `laravel`, `filament` (+67 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **8 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `TranslationFile` connect `Modules\Xot\Contracts\UserContract` to `Illuminate\Database\Seeder`, `TranslationFileResource.php`, `Post`, `TestCase.php`?**
  _High betweenness centrality (0.075) - this node is a cross-community bridge._
- **Why does `Post` connect `Post` to `Illuminate\Database\Seeder`, `TestCase.php`?**
  _High betweenness centrality (0.056) - this node is a cross-community bridge._
- **Are the 4 inferred relationships involving `Translation` (e.g. with `.execute()` and `.notifyMissingKey()`) actually correct?**
  _`Translation` has 4 INFERRED edges - model-reasoned connections that need verification._
- **What connects `name`, `description`, `laraxot` to the rest of the system?**
  _72 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Spatie\QueueableAction\QueueableAction` be split into smaller, more focused modules?**
  _Cohesion score 0.05202661826981246 - nodes in this community are weakly interconnected._
- **Should `Modules\Xot\Contracts\UserContract` be split into smaller, more focused modules?**
  _Cohesion score 0.07955596669750231 - nodes in this community are weakly interconnected._
- **Should `Post` be split into smaller, more focused modules?**
  _Cohesion score 0.06565656565656566 - nodes in this community are weakly interconnected._