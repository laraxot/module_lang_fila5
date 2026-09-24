<?php

declare(strict_types=1);
<<<<<<< HEAD

=======
<<<<<<< .merge_file_m6hTgD

=======
<<<<<<< .merge_file_DyfLZP

=======
<<<<<<< .merge_file_QCC96S

=======
>>>>>>> .merge_file_bf4J38
>>>>>>> .merge_file_oPURoh
>>>>>>> .merge_file_5POu7m
>>>>>>> laraxot/dev
use Modules\Lang\Datas\LangData;
use Modules\Lang\Tests\TestCase;
use Modules\Lang\View\Composers\ThemeComposer;
use PHPUnit\Framework\Assert;
use Spatie\LaravelData\DataCollection;

uses(TestCase::class);

test('ThemeComposer languages usa fallback quando manca config', function (): void {
    config(['laravellocalization' => []]);

<<<<<<< HEAD
    $composer = new ThemeComposer();
=======
<<<<<<< .merge_file_m6hTgD
    $composer = new ThemeComposer();
=======
<<<<<<< .merge_file_DyfLZP
    $composer = new ThemeComposer();
=======
<<<<<<< .merge_file_QCC96S
    $composer = new ThemeComposer();
=======
    $composer = new ThemeComposer;
>>>>>>> .merge_file_bf4J38
>>>>>>> .merge_file_oPURoh
>>>>>>> .merge_file_5POu7m
>>>>>>> laraxot/dev
    $langs = $composer->languages();

    Assert::assertInstanceOf(DataCollection::class, $langs);
    Assert::assertGreaterThanOrEqual(2, $langs->count());
});

test('ThemeComposer languages rifiuta config non array', function (): void {
    config(['laravellocalization.supportedLocales' => 'invalid']);

    try {
<<<<<<< HEAD
        (new ThemeComposer())->languages();
=======
<<<<<<< .merge_file_m6hTgD
        (new ThemeComposer())->languages();
=======
<<<<<<< .merge_file_DyfLZP
        (new ThemeComposer())->languages();
=======
<<<<<<< .merge_file_QCC96S
        (new ThemeComposer())->languages();
=======
        (new ThemeComposer)->languages();
>>>>>>> .merge_file_bf4J38
>>>>>>> .merge_file_oPURoh
>>>>>>> .merge_file_5POu7m
>>>>>>> laraxot/dev
        Assert::fail('Expected Exception');
    } catch (Exception $e) {
        Assert::assertStringContainsString('Invalid config', $e->getMessage());
    }
});

test('ThemeComposer languages rifiuta item non array', function (): void {
    config(['laravellocalization.supportedLocales' => ['it' => 'bad']]);

    try {
<<<<<<< HEAD
        (new ThemeComposer())->languages();
=======
<<<<<<< .merge_file_m6hTgD
        (new ThemeComposer())->languages();
=======
<<<<<<< .merge_file_DyfLZP
        (new ThemeComposer())->languages();
=======
<<<<<<< .merge_file_QCC96S
        (new ThemeComposer())->languages();
=======
        (new ThemeComposer)->languages();
>>>>>>> .merge_file_bf4J38
>>>>>>> .merge_file_oPURoh
>>>>>>> .merge_file_5POu7m
>>>>>>> laraxot/dev
        Assert::fail('Expected InvalidArgumentException');
    } catch (InvalidArgumentException $e) {
        Assert::assertStringContainsString('Expected array at locale', $e->getMessage());
    }
});

test('ThemeComposer languages rifiuta item senza name/regional', function (): void {
    config(['laravellocalization.supportedLocales' => ['it' => ['foo' => 'bar']]]);

    try {
<<<<<<< HEAD
        (new ThemeComposer())->languages();
=======
<<<<<<< .merge_file_m6hTgD
        (new ThemeComposer())->languages();
=======
<<<<<<< .merge_file_DyfLZP
        (new ThemeComposer())->languages();
=======
<<<<<<< .merge_file_QCC96S
        (new ThemeComposer())->languages();
=======
        (new ThemeComposer)->languages();
>>>>>>> .merge_file_bf4J38
>>>>>>> .merge_file_oPURoh
>>>>>>> .merge_file_5POu7m
>>>>>>> laraxot/dev
        Assert::fail('Expected InvalidArgumentException');
    } catch (InvalidArgumentException $e) {
        Assert::assertStringContainsString('regional', $e->getMessage());
    }
});

test('ThemeComposer otherLanguages esclude locale corrente', function (): void {
    config([
        'laravellocalization.supportedLocales' => [
            'it' => ['name' => 'Italiano', 'regional' => 'it_IT'],
            'en' => ['name' => 'English', 'regional' => 'en_US'],
        ],
    ]);
    app()->setLocale('it');

<<<<<<< HEAD
    $others = (new ThemeComposer())->otherLanguages();
=======
<<<<<<< .merge_file_m6hTgD
    $others = (new ThemeComposer())->otherLanguages();
=======
<<<<<<< .merge_file_DyfLZP
    $others = (new ThemeComposer())->otherLanguages();
=======
<<<<<<< .merge_file_QCC96S
    $others = (new ThemeComposer())->otherLanguages();
=======
    $others = (new ThemeComposer)->otherLanguages();
>>>>>>> .merge_file_bf4J38
>>>>>>> .merge_file_oPURoh
>>>>>>> .merge_file_5POu7m
>>>>>>> laraxot/dev
    $ids = $others->toCollection()->map(fn (LangData $d): string => $d->id)->all();

    Assert::assertNotContains('it', $ids);
    Assert::assertContains('en', $ids);
});

test('ThemeComposer currentLang restituisce name e gestisce campo non stringa', function (): void {
    config([
        'laravellocalization.supportedLocales' => [
            'it' => ['name' => 'Italiano', 'regional' => 'it_IT'],
        ],
    ]);
    app()->setLocale('it');

<<<<<<< HEAD
    $composer = new ThemeComposer();
=======
<<<<<<< .merge_file_m6hTgD
    $composer = new ThemeComposer();
=======
<<<<<<< .merge_file_DyfLZP
    $composer = new ThemeComposer();
=======
<<<<<<< .merge_file_QCC96S
    $composer = new ThemeComposer();
=======
    $composer = new ThemeComposer;
>>>>>>> .merge_file_bf4J38
>>>>>>> .merge_file_oPURoh
>>>>>>> .merge_file_5POu7m
>>>>>>> laraxot/dev
    Assert::assertSame('Italiano', $composer->currentLang('name'));
    Assert::assertSame('it', $composer->currentLang('id'));
});

test('ThemeComposer buildAdminLanguageUrl senza route corrente torna hash', function (): void {
<<<<<<< HEAD
    Assert::assertSame('#', (new ThemeComposer())->buildAdminLanguageUrl('en'));
=======
<<<<<<< .merge_file_m6hTgD
    Assert::assertSame('#', (new ThemeComposer())->buildAdminLanguageUrl('en'));
=======
<<<<<<< .merge_file_DyfLZP
    Assert::assertSame('#', (new ThemeComposer())->buildAdminLanguageUrl('en'));
=======
<<<<<<< .merge_file_QCC96S
    Assert::assertSame('#', (new ThemeComposer())->buildAdminLanguageUrl('en'));
=======
    Assert::assertSame('#', (new ThemeComposer)->buildAdminLanguageUrl('en'));
>>>>>>> .merge_file_bf4J38
>>>>>>> .merge_file_oPURoh
>>>>>>> .merge_file_5POu7m
>>>>>>> laraxot/dev
});

test('ThemeComposer languages mappa en regional a flag gb', function (): void {
    config([
        'laravellocalization.supportedLocales' => [
            'en' => ['name' => 'English', 'regional' => 'en_US'],
        ],
    ]);

<<<<<<< HEAD
    $lang = (new ThemeComposer())->languages()->toCollection()->first();
=======
<<<<<<< .merge_file_m6hTgD
    $lang = (new ThemeComposer())->languages()->toCollection()->first();
=======
<<<<<<< .merge_file_DyfLZP
    $lang = (new ThemeComposer())->languages()->toCollection()->first();
=======
<<<<<<< .merge_file_QCC96S
    $lang = (new ThemeComposer())->languages()->toCollection()->first();
=======
    $lang = (new ThemeComposer)->languages()->toCollection()->first();
>>>>>>> .merge_file_bf4J38
>>>>>>> .merge_file_oPURoh
>>>>>>> .merge_file_5POu7m
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(LangData::class, $lang);
    Assert::assertStringContainsString('iti__gb', $lang->flag);
});
