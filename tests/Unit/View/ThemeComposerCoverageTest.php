<?php

declare(strict_types=1);

use Modules\Lang\Datas\LangData;
use Modules\Lang\Tests\TestCase;
use Modules\Lang\View\Composers\ThemeComposer;
use PHPUnit\Framework\Assert;
use Spatie\LaravelData\DataCollection;

uses(TestCase::class);

test('ThemeComposer languages usa fallback quando manca config', function (): void {
    config(['laravellocalization' => []]);

<<<<<<< .merge_file_gbq4xs
    $composer = new ThemeComposer;
=======
    $composer = new ThemeComposer();
>>>>>>> .merge_file_FFzJHW
    $langs = $composer->languages();

    Assert::assertInstanceOf(DataCollection::class, $langs);
    Assert::assertGreaterThanOrEqual(2, $langs->count());
});

test('ThemeComposer languages rifiuta config non array', function (): void {
    config(['laravellocalization.supportedLocales' => 'invalid']);

    try {
<<<<<<< .merge_file_gbq4xs
        (new ThemeComposer)->languages();
        Assert::fail('Expected Exception');
    } catch (\Exception $e) {
=======
        (new ThemeComposer())->languages();
        Assert::fail('Expected Exception');
    } catch (Exception $e) {
>>>>>>> .merge_file_FFzJHW
        Assert::assertStringContainsString('Invalid config', $e->getMessage());
    }
});

test('ThemeComposer languages rifiuta item non array', function (): void {
    config(['laravellocalization.supportedLocales' => ['it' => 'bad']]);

    try {
<<<<<<< .merge_file_gbq4xs
        (new ThemeComposer)->languages();
        Assert::fail('Expected InvalidArgumentException');
    } catch (\InvalidArgumentException $e) {
=======
        (new ThemeComposer())->languages();
        Assert::fail('Expected InvalidArgumentException');
    } catch (InvalidArgumentException $e) {
>>>>>>> .merge_file_FFzJHW
        Assert::assertStringContainsString('Expected array at locale', $e->getMessage());
    }
});

test('ThemeComposer languages rifiuta item senza name/regional', function (): void {
    config(['laravellocalization.supportedLocales' => ['it' => ['foo' => 'bar']]]);

    try {
<<<<<<< .merge_file_gbq4xs
        (new ThemeComposer)->languages();
        Assert::fail('Expected InvalidArgumentException');
    } catch (\InvalidArgumentException $e) {
=======
        (new ThemeComposer())->languages();
        Assert::fail('Expected InvalidArgumentException');
    } catch (InvalidArgumentException $e) {
>>>>>>> .merge_file_FFzJHW
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

<<<<<<< .merge_file_gbq4xs
    $others = (new ThemeComposer)->otherLanguages();
=======
    $others = (new ThemeComposer())->otherLanguages();
>>>>>>> .merge_file_FFzJHW
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

<<<<<<< .merge_file_gbq4xs
    $composer = new ThemeComposer;
=======
    $composer = new ThemeComposer();
>>>>>>> .merge_file_FFzJHW
    Assert::assertSame('Italiano', $composer->currentLang('name'));
    Assert::assertSame('it', $composer->currentLang('id'));
});

test('ThemeComposer buildAdminLanguageUrl senza route corrente torna hash', function (): void {
<<<<<<< .merge_file_gbq4xs
    Assert::assertSame('#', (new ThemeComposer)->buildAdminLanguageUrl('en'));
=======
    Assert::assertSame('#', (new ThemeComposer())->buildAdminLanguageUrl('en'));
>>>>>>> .merge_file_FFzJHW
});

test('ThemeComposer languages mappa en regional a flag gb', function (): void {
    config([
        'laravellocalization.supportedLocales' => [
            'en' => ['name' => 'English', 'regional' => 'en_US'],
        ],
    ]);

<<<<<<< .merge_file_gbq4xs
    $lang = (new ThemeComposer)->languages()->toCollection()->first();
=======
    $lang = (new ThemeComposer())->languages()->toCollection()->first();
>>>>>>> .merge_file_FFzJHW
    Assert::assertInstanceOf(LangData::class, $lang);
    Assert::assertStringContainsString('iti__gb', $lang->flag);
});
