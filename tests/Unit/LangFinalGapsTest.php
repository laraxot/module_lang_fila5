<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Unit;

use Filament\Actions\Action;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\Entry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Tables\Columns\Column;
use Filament\Tables\Filters\BaseFilter;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\HtmlString;
use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\Translator as LaravelTranslator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
use Mockery;
=======
<<<<<<< .merge_file_ZYE65J
=======
use Mockery;
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
use Mockery;
>>>>>>> laraxot/dev
use Mockery\MockInterface;
use Modules\Lang\Actions\Filament\AutoLabelAction;
use Modules\Lang\Actions\SaveTransAction;
use Modules\Lang\Actions\SyncTranslationsAction;
use Modules\Lang\Actions\Translation\RecordMissingTranslationAction;
use Modules\Lang\Actions\TranslatorAction;
use Modules\Lang\Actions\WriteTranslationFileAction;
use Modules\Lang\Adapters\TranslatorAdapter;
use Modules\Lang\Datas\LangData;
use Modules\Lang\Filament\Actions\LocaleSwitcherRefresh;
use Modules\Lang\Filament\Forms\Components\NationalFlagSelect;
use Modules\Lang\Filament\Forms\Components\TranslationEditor;
use Modules\Lang\Filament\Resources\TranslationFileResource\Pages\EditTranslationFile;
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
use Modules\Lang\Http\Livewire\Lang\Switcher as LangSwitcher;
=======
<<<<<<< .merge_file_ZYE65J
use Modules\Lang\Http\Livewire\Lang\Switcher as LangSwitcher;
=======
<<<<<<< .merge_file_CtdPUc
use Modules\Lang\Http\Livewire\Lang\Switcher as LangSwitcher;
=======
use Modules\Lang\Filament\Widgets\LanguageSwitcherWidget;
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
use Modules\Lang\Http\Livewire\Lang\Switcher as LangSwitcher;
>>>>>>> laraxot/dev
use Modules\Lang\Models\Post;
use Modules\Lang\Models\TranslationFile;
use Modules\Lang\Providers\RouteServiceProvider;
use Modules\Lang\Tests\TestCase;
use Modules\Lang\View\Composers\ThemeComposer;
use Modules\Xot\Actions\File\AssetAction;
use Modules\Xot\Actions\File\SvgExistsAction;
use Modules\Xot\Actions\GetTransKeyAction;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
use ReflectionMethod;
use ReflectionProperty;
=======
<<<<<<< .merge_file_ZYE65J
=======
use ReflectionMethod;
use ReflectionProperty;
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
use ReflectionMethod;
use ReflectionProperty;
>>>>>>> laraxot/dev

use function Safe\file_put_contents;
use function Safe\mkdir;
use function Safe\rename;
use function Safe\rmdir;
use function Safe\unlink;

uses(TestCase::class);

final class WriteTranslationFileActionFailStub extends WriteTranslationFileAction
{
    /**
     * Simula il fallimento della scrittura: ritorna sempre `false`, mai un conteggio
     * di byte, quindi il tipo di ritorno e' `false` e non `int|false`.
     */
    protected function putTranslationFile(string $filePath, string $phpContent): false
    {
        return false;
    }
}

final class WriteTranslationFileActionWriteFailStub extends WriteTranslationFileAction
{
    /**
     * Come sopra: solo il ramo di fallimento, quindi `false`.
     */
    protected function writeLangTempContents(string $tempFile, string $phpContent): false
    {
        return false;
    }
}

final class NationalFlagSelectFinalStub extends NationalFlagSelect
{
    /** @var array<int, mixed> */
    public array $forcedCountries = [];

    /** @var array<int, mixed> */
    public array $extraFilteredRows = [];

    /**
     * `mixed` e' il tipo vero, non una scorciatoia: i test alimentano di proposito righe
     * non conformi — array associativi validi, interi al posto di stringhe e stringhe nude —
     * per verificare che il filtro regga input sporco. Un tipo piu' stretto renderebbe
     * impossibile scrivere proprio il caso in esame.
     *
     * @return array<int, mixed>
     */
    protected function resolveCountries(): array
    {
        return $this->forcedCountries;
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
     * @param  array<int, mixed>  $filteredCountries
=======
<<<<<<< .merge_file_ZYE65J
     * @param array<int, mixed> $filteredCountries
     *
=======
     * @param  array<int, mixed>  $filteredCountries
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
     * @param  array<int, mixed>  $filteredCountries
>>>>>>> laraxot/dev
     * @return array<int, mixed>
     */
    protected function finalizeFilteredCountries(array $filteredCountries): array
    {
        return array_merge(array_values($filteredCountries), $this->extraFilteredRows);
    }
}

final class AutoLabelForcedKeyStub extends AutoLabelAction
{
    /**
     * @return array<string, string>
     */
    protected function findCallerFrame(Field|Entry|BaseFilter|Column|Step|Action|Section $component): array
    {
        return ['class' => self::class];
    }
}

final class AutoLabelNullCallerStub extends AutoLabelAction
{
    /**
     * @return array<string, string>
     */
    protected function findCallerFrame(Field|Entry|BaseFilter|Column|Step|Action|Section $component): array
    {
        return ['function' => 'foo'];
    }
}

final class AutoLabelExecuteNestedCaller
{
    public function execute(Field|Entry|BaseFilter|Column|Step|Action|Section $component, string $type = 'label'): Field|Entry|BaseFilter|Column|Step|Action|Section
    {
        return app(AutoLabelAction::class)->execute($component, $type);
    }
}

final class AutoLabelStaticCaller
{
    public static function run(Field|Entry|BaseFilter|Column|Step|Action|Section $component, string $type = 'label'): Field|Entry|BaseFilter|Column|Step|Action|Section
    {
        return app(AutoLabelAction::class)->execute($component, $type);
    }
}

final class PostNullTitleForGuidStub extends Post
{
    /**
     * Copre il solo ramo «titolo assente»: non restituisce mai una stringa.
     */
    protected function titleForGuid(): null
    {
        return null;
    }
}

final class ThemeComposerNonStringFieldStub extends ThemeComposer
{
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    protected function langFieldValue(LangData $lang, string $field): mixed
=======
<<<<<<< .merge_file_ZYE65J
    protected function langFieldValue(LangData $lang, string $field): mixed
=======
<<<<<<< .merge_file_CtdPUc
    protected function langFieldValue(LangData $lang, string $field): mixed
=======
    protected function langFieldValue(LangData $lang, string $field): int
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    protected function langFieldValue(LangData $lang, string $field): mixed
>>>>>>> laraxot/dev
    {
        return 42;
    }
}

afterEach(function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
=======
<<<<<<< .merge_file_ZYE65J
    \Mockery::close();
});

test('EditTranslationFile schemaFromRecord covers both branches', function (): void {
    $edit = new EditTranslationFile();
=======
>>>>>>> .merge_file_4xgoE1
=======
>>>>>>> laraxot/dev
    Mockery::close();
});

test('EditTranslationFile schemaFromRecord covers both branches', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    $edit = new EditTranslationFile();
=======
<<<<<<< .merge_file_CtdPUc
    $edit = new EditTranslationFile();
=======
    $edit = new EditTranslationFile;
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    $edit = new EditTranslationFile();
>>>>>>> laraxot/dev
    Assert::assertNotEmpty($edit->schemaFromRecord((object) ['content' => ['hello' => 'world']]));
    Assert::assertSame([], $edit->schemaFromRecord(null));
    Assert::assertSame([], $edit->schemaFromRecord((object) ['content' => 'scalar']));
    Assert::assertSame([], $edit->schemaFromRecord((object) []));
});

test('LocaleSwitcherRefresh applyLocale covers string and non-string locale', function (): void {
    app()->instance('request', Request::create('http://localhost/it', 'GET', [], [], [], [
        'HTTP_REFERER' => 'http://localhost/it',
    ]));
    $action = LocaleSwitcherRefresh::make('x');
    $action->applyLocale(['locale' => 'en']);
    Assert::assertSame('en', app()->getLocale());
    $action->applyLocale(['locale' => 123]);
<<<<<<< HEAD
    Assert::assertSame('en', app()->getLocale());
    $action->applyLocale([]);
    Assert::assertSame('en', app()->getLocale());
=======
    expect(app()->getLocale())->toBe('en');
    $action->applyLocale([]);
    expect(app()->getLocale())->toBe('en');
>>>>>>> laraxot/dev
});

test('TranslatorAction and Adapter coerce non-string loaded values', function (): void {
    // Qui c'era `TestCase::forceSqliteTranslations()`, un helper invocato e mai
    // scritto. Non e' stato scritto ma rimosso: il test non tocca il database.
    // Carica le traduzioni da un `ArrayLoader`, scrive la property `loaded` per
    // reflection e mocka `RecordMissingTranslationAction`, che e' l'unico punto
    // che avrebbe interrogato una connessione. Un helper che forzasse la
    // connessione a SQLite avrebbe dato l'impressione di proteggere qualcosa
    // che non e' in pericolo, e avrebbe contraddetto la regola per cui i test
    // girano sulle repliche MySQL. Story LANG-17.4.
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    $loader = new ArrayLoader();
    $action = new TranslatorAction($loader, 'it');
    $loaded = new ReflectionProperty(LaravelTranslator::class, 'loaded');
=======
<<<<<<< .merge_file_ZYE65J
    $loader = new ArrayLoader();
    $action = new TranslatorAction($loader, 'it');
    $loaded = new \ReflectionProperty(LaravelTranslator::class, 'loaded');
=======
<<<<<<< .merge_file_CtdPUc
    $loader = new ArrayLoader();
=======
    $loader = new ArrayLoader;
>>>>>>> .merge_file_LlUNeP
    $action = new TranslatorAction($loader, 'it');
    $loaded = new ReflectionProperty(LaravelTranslator::class, 'loaded');
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    $loader = new ArrayLoader();
    $action = new TranslatorAction($loader, 'it');
    $loaded = new ReflectionProperty(LaravelTranslator::class, 'loaded');
>>>>>>> laraxot/dev
    $loaded->setAccessible(true);
    // JSON translation path returns non-string/non-array values without notifyMissingKey/DB
    $loaded->setValue($action, ['*' => ['*' => ['it' => ['json.int.key' => 42]]]]);
    Assert::assertSame('42', $action->get('json.int.key', [], 'it', false));

    $adapter = new TranslatorAdapter($loader, 'it');
    $loaded->setValue($adapter, ['*' => ['*' => ['it' => ['json.int.key' => 99]]]]);
    $this->mockService(RecordMissingTranslationAction::class, static function (MockInterface $mock): void {
        $mock->allows('execute');
    });
    Assert::assertSame('99', $adapter->get('json.int.key', [], 'it', false));
});

test('ThemeComposer fallback locales and buildAdminLanguageUrl', function (): void {
    Config::set('laravellocalization', []);
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    $composer = new ThemeComposer();
=======
<<<<<<< .merge_file_ZYE65J
    $composer = new ThemeComposer();
=======
<<<<<<< .merge_file_CtdPUc
    $composer = new ThemeComposer();
=======
    $composer = new ThemeComposer;
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    $composer = new ThemeComposer();
>>>>>>> laraxot/dev
    Assert::assertGreaterThan(0, $composer->languages()->count());

    Assert::assertSame('#', $composer->buildAdminLanguageUrl('it'));

    config([
        'laravellocalization.supportedLocales' => [
            'it' => ['name' => 'Italiano', 'regional' => 'it_IT'],
            'en' => ['name' => 'English', 'regional' => 'en_US'],
        ],
    ]);
    Route::shouldReceive('currentRouteName')->andReturn('home');
    Route::shouldReceive('current')->andReturn(null);
    Route::shouldReceive('has')->andReturn(true);
    $url = $composer->buildAdminLanguageUrl('en');
    Assert::assertNotSame('', $url);
});

test('RouteServiceProvider covers fallback locales and admin segment index', function (): void {
    config(['laravellocalization.supportedLocales' => null]);
    app()->instance('request', Request::create('http://localhost/it/admin/dashboard', 'GET'));
    session(['in_admin' => true]);
    $provider = new RouteServiceProvider(app());
    $provider->registerLang();
    Assert::assertContains(app()->getLocale(), ['it', 'en']);
});

test('TranslationFile respects configured PHPStan runtime boundary', function (): void {
    config(['app.phpstan_running' => true]);
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    Assert::assertSame([], (new TranslationFile())->getRows());
=======
<<<<<<< .merge_file_ZYE65J
    Assert::assertSame([], (new TranslationFile())->getRows());
=======
<<<<<<< .merge_file_CtdPUc
    Assert::assertSame([], (new TranslationFile())->getRows());
=======
    Assert::assertSame([], (new TranslationFile)->getRows());
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    Assert::assertSame([], (new TranslationFile())->getRows());
>>>>>>> laraxot/dev
    config(['app.phpstan_running' => false]);
});

test('SyncTranslationsAction skips empty casted glob entries', function (): void {
    $action = app(SyncTranslationsAction::class);
    $tmpModule = 'LangFinal'.uniqid();
    $base = base_path('Modules/'.$tmpModule);
    mkdir($base.'/lang/it', 0o755, true);
    file_put_contents($base.'/lang/it/ok.php', "<?php\nreturn ['a' => 'b'];\n");

    File::partialMock()
        ->shouldReceive('glob')
        ->andReturn([null, '', $base.'/lang/it/ok.php']);
    File::shouldReceive('exists')->andReturnUsing(static fn (string $p): bool => file_exists($p) || is_dir($p));
    File::shouldReceive('makeDirectory')->andReturn(true);
    File::shouldReceive('put')->andReturn(10);

    try {
        $result = $action->execute('it', ['en'], $tmpModule);
        Assert::assertIsArray($result);
        Assert::assertIsArray($result['modules']);
        Assert::assertIsArray($result['modules'][$tmpModule]);
        Assert::assertSame('completed', $result['modules'][$tmpModule]['status']);
    } finally {
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
        Mockery::close();
=======
<<<<<<< .merge_file_ZYE65J
        \Mockery::close();
=======
        Mockery::close();
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
        Mockery::close();
>>>>>>> laraxot/dev
        if (is_dir($base)) {
            File::deleteDirectory($base);
        }
    }
});

test('WriteTranslationFileAction createBackup makes directory', function (): void {
    $backupDir = storage_path('app/backups/translations');
    if (is_dir($backupDir)) {
        // rename temporarily
        $moved = $backupDir.'_bak_'.uniqid();
        rename($backupDir, $moved);
    } else {
        $moved = null;
    }

    $path = sys_get_temp_dir().'/wfa_'.uniqid().'.php';
    TestCase::createTranslationFile($path, ['x' => '1']);
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    app()->instance('cache', new class()
    {
        public function flush(): void {}
=======
<<<<<<< .merge_file_ZYE65J
    app()->instance('cache', new class {
        public function flush(): void
        {
        }
=======
<<<<<<< .merge_file_CtdPUc
    app()->instance('cache', new class()
=======
    app()->instance('cache', new class
>>>>>>> .merge_file_LlUNeP
    {
        public function flush(): void {}
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    app()->instance('cache', new class()
    {
        public function flush(): void {}
>>>>>>> laraxot/dev
    });

    try {
        Assert::assertTrue(app(WriteTranslationFileAction::class)->execute($path, ['x' => '2']));
        Assert::assertDirectoryExists(storage_path('app/backups/translations'));
    } finally {
        if (file_exists($path)) {
            unlink($path);
        }
        if (isset($moved) && is_dir($moved)) {
            if (is_dir($backupDir)) {
                File::deleteDirectory($backupDir);
            }
            rename($moved, $backupDir);
        }
    }
});

<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
=======
<<<<<<< .merge_file_ZYE65J
=======
<<<<<<< .merge_file_CtdPUc
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
>>>>>>> laraxot/dev
test('Switcher covers non-string localized url branch', function (): void {
    config([
        'laravellocalization.supportedLocales' => [
            'it' => ['name' => 'Italiano'],
            'en' => ['name' => 'English'],
        ],
    ]);
    app()->setLocale('it');
    LaravelLocalization::shouldReceive('getSupportedLocales')
        ->andReturn(['it' => ['name' => 'Italiano'], 'en' => ['name' => 'English']]);
    LaravelLocalization::shouldReceive('getLocalizedURL')
        ->andReturn(true);

    $switcher = new LangSwitcher();
    $switcher->mount();
    Assert::assertSame('/en', $switcher->langs['en']['url']);
});

test('Post linkable and accessor edge branches', function (): void {
    $post = new Post();
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
=======
<<<<<<< .merge_file_ZYE65J
=======
=======
test('LanguageSwitcherWidget falls back when getLocalizedURL returns non-string true', function (): void {
    LaravelLocalization::shouldReceive('getLocalizedURL')
        ->andReturn(true);

    $widget = new LanguageSwitcherWidget;
    Assert::assertSame('/en', $widget->getLanguageUrl('en'));
});

test('Post linkable and accessor edge branches', function (): void {
    $post = new Post;
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(MorphTo::class, $post->linkable());

    $post->setRawAttributes(['post_type' => 123, 'post_id' => ['x']], true);
    Assert::assertIsString($post->getTitleAttribute(null));

<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    $post2 = new Post();
=======
<<<<<<< .merge_file_ZYE65J
    $post2 = new Post();
=======
<<<<<<< .merge_file_CtdPUc
    $post2 = new Post();
=======
    $post2 = new Post;
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    $post2 = new Post();
>>>>>>> laraxot/dev
    $post2->setRawAttributes(['title' => null], true);
    // guid with null title falls through
    Assert::assertIsString($post2->getGuidAttribute(' '));
});

test('NationalFlagSelect array localized name and bad code in filter', function (): void {
    $this->mockService(AssetAction::class, static function (MockInterface $mock): void {
        $mock->allows(['execute' => '/f.svg']);
    });
    app('translator')->addLines(['countries.it' => ['label' => 'Italia']], 'it');
    app()->setLocale('it');

    $select = NationalFlagSelectFinalStub::make('c');
    $select->forcedCountries = [
        ['iso_3166_1_alpha2' => 'IT', 'name' => 'Italy'],
        ['iso_3166_1_alpha2' => 9, 'name' => 'Bad'],
        'nope',
    ];
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    $f = new ReflectionMethod(NationalFlagSelect::class, 'getFilteredCountryOptions');
=======
<<<<<<< .merge_file_ZYE65J
    $f = new \ReflectionMethod(NationalFlagSelect::class, 'getFilteredCountryOptions');
=======
    $f = new ReflectionMethod(NationalFlagSelect::class, 'getFilteredCountryOptions');
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    $f = new ReflectionMethod(NationalFlagSelect::class, 'getFilteredCountryOptions');
>>>>>>> laraxot/dev
    $f->setAccessible(true);
    Assert::assertIsArray($f->invoke($select, 'ital'));
    Assert::assertIsArray($f->invoke($select, 'IT'));
});

test('TranslationEditor make preserves the field name', function (): void {
    $editor = TranslationEditor::make('c');
    Assert::assertSame('c', $editor->getName());
});

test('WriteTranslationFileAction throws when put fails', function (): void {
    $path = sys_get_temp_dir().'/wfail_'.uniqid().'.php';
    TestCase::createTranslationFile($path, ['a' => '1']);
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
=======
<<<<<<< .merge_file_ZYE65J
    app()->instance('cache', new class {
        public function flush(): void
        {
        }
    });
    $action = new WriteTranslationFileActionFailStub();
=======
<<<<<<< .merge_file_CtdPUc
>>>>>>> .merge_file_4xgoE1
=======
>>>>>>> laraxot/dev
    app()->instance('cache', new class()
    {
        public function flush(): void {}
    });
    $action = new WriteTranslationFileActionFailStub();
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
=======
=======
    app()->instance('cache', new class
    {
        public function flush(): void {}
    });
    $action = new WriteTranslationFileActionFailStub;
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
>>>>>>> laraxot/dev
    expect(fn () => $action->execute($path, ['a' => '2']))->toThrow(\Exception::class);
    unlink($path);
});

test('Post guid null title uses random fallback', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    $post = new Post();
=======
<<<<<<< .merge_file_ZYE65J
    $post = new Post();
=======
<<<<<<< .merge_file_CtdPUc
    $post = new Post();
=======
    $post = new Post;
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    $post = new Post();
>>>>>>> laraxot/dev
    $post->setRawAttributes([], true);
    // force title accessor path to null then guid
    $guid = $post->getGuidAttribute(null);
    Assert::assertIsString($guid);
});

test('RouteServiceProvider non-array locales and admin n=3', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    config(['laravellocalization.supportedLocales' => new \stdClass()]);
=======
<<<<<<< .merge_file_ZYE65J
    config(['laravellocalization.supportedLocales' => new \stdClass()]);
=======
<<<<<<< .merge_file_CtdPUc
    config(['laravellocalization.supportedLocales' => new \stdClass()]);
=======
    config(['laravellocalization.supportedLocales' => new \stdClass]);
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    config(['laravellocalization.supportedLocales' => new \stdClass()]);
>>>>>>> laraxot/dev
    $request = Request::create('http://localhost/it/admin/pages', 'GET');
    app()->instance('request', $request);
    \Illuminate\Support\Facades\Request::swap($request);
    session(['in_admin' => true]);
    (new RouteServiceProvider(app()))->registerLang();
    Assert::assertContains(app()->getLocale(), ['it', 'en']);
});

test('ThemeComposer inAdmin language urls and non-string currentLang field', function (): void {
    config([
        'laravellocalization.supportedLocales' => [
            'it' => ['name' => 'Italiano', 'regional' => 'it_IT'],
            'en' => ['name' => 'English', 'regional' => 'en_US'],
        ],
    ]);
    $request = Request::create('http://localhost/it/admin/dashboard', 'GET');
    app()->instance('request', $request);
    \Illuminate\Support\Facades\Request::swap($request);
    app()->setLocale('it');
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    $composer = new ThemeComposer();
=======
<<<<<<< .merge_file_ZYE65J
    $composer = new ThemeComposer();
=======
<<<<<<< .merge_file_CtdPUc
    $composer = new ThemeComposer();
=======
    $composer = new ThemeComposer;
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    $composer = new ThemeComposer();
>>>>>>> laraxot/dev
    Assert::assertGreaterThan(0, $composer->languages()->count());
    // flag field is HTML string; asking a missing dynamic property via currentLang on 'flag' works as string
    Assert::assertStringContainsString('<', $composer->currentLang('flag'));
});

test('NationalFlagSelect hits array localized translation branch', function (): void {
    $this->mockService(AssetAction::class, static function (MockInterface $mock): void {
        $mock->allows(['execute' => '/f.svg']);
    });
    app('translator')->addLines(['countries.it' => ['x' => 'y']], 'it', 'lang');
    app()->setLocale('it');
    $select = NationalFlagSelectFinalStub::make('c');
    $select->forcedCountries = [
        ['iso_3166_1_alpha2' => 'IT', 'name' => 'Italy'],
    ];
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    $f = new ReflectionMethod(NationalFlagSelect::class, 'getFilteredCountryOptions');
=======
<<<<<<< .merge_file_ZYE65J
    $f = new \ReflectionMethod(NationalFlagSelect::class, 'getFilteredCountryOptions');
=======
    $f = new ReflectionMethod(NationalFlagSelect::class, 'getFilteredCountryOptions');
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    $f = new ReflectionMethod(NationalFlagSelect::class, 'getFilteredCountryOptions');
>>>>>>> laraxot/dev
    $f->setAccessible(true);
    $options = $f->invoke($select, 'ital');
    Assert::assertIsArray($options);
    Assert::assertArrayHasKey('IT', $options);
});

test('AutoLabelAction covers FIX label for array translation', function (): void {
    $this->mockService(GetTransKeyAction::class, static function (MockInterface $mock): void {
        $mock->allows(['execute' => 'lang::form']);
    });
    $this->mockService(SaveTransAction::class, static function (MockInterface $mock): void {
        $mock->allows('execute');
    });
    $this->mockService(SvgExistsAction::class, static function (MockInterface $mock): void {
        $mock->allows(['execute' => true]);
    });
    app('translator')->addLines([
        'form.sections.empty.heading' => ['a' => 'b'],
        'form.fields.help.helper_text' => '<b>h</b>',
        'form.actions.z.icon' => 'heroicon-o-check',
        'form.fields.title.label' => 'Titolo',
        'form.sections.htmlcast.heading' => 'Casted',
    ], 'it', 'lang');
    app()->setLocale('it');

<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    $action = new AutoLabelForcedKeyStub();
=======
<<<<<<< .merge_file_ZYE65J
    $action = new AutoLabelForcedKeyStub();
=======
<<<<<<< .merge_file_CtdPUc
    $action = new AutoLabelForcedKeyStub();
=======
    $action = new AutoLabelForcedKeyStub;
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    $action = new AutoLabelForcedKeyStub();
>>>>>>> laraxot/dev
    $section = Section::make()->heading(null);
    Assert::assertSame($section, $action->execute($section, 'heading'));

    $help = TextInput::make('help');
    Assert::assertSame($help, $action->execute($help, 'helperText'));

    $act = Action::make('z');
    Assert::assertSame($act, $action->execute($act, 'icon'));

    $field = TextInput::make('title');
    Assert::assertSame($field, $action->execute($field, 'label'));

    $htmlHeading = Section::make()->heading(new HtmlString('<i>htmlcast</i>'));
    Assert::assertSame($htmlHeading, $action->execute($htmlHeading, 'heading'));
});

test('AutoLabelAction null caller frame returns component early', function (): void {
    $field = TextInput::make('x');
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    Assert::assertSame($field, (new AutoLabelNullCallerStub())->execute($field, 'label'));
=======
<<<<<<< .merge_file_ZYE65J
    Assert::assertSame($field, (new AutoLabelNullCallerStub())->execute($field, 'label'));
=======
<<<<<<< .merge_file_CtdPUc
    Assert::assertSame($field, (new AutoLabelNullCallerStub())->execute($field, 'label'));
=======
    Assert::assertSame($field, (new AutoLabelNullCallerStub)->execute($field, 'label'));
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    Assert::assertSame($field, (new AutoLabelNullCallerStub())->execute($field, 'label'));
>>>>>>> laraxot/dev
});

test('AutoLabelAction nested execute caller covers execute skip frame', function (): void {
    $this->mockService(GetTransKeyAction::class, static function (MockInterface $mock): void {
        $mock->allows(['execute' => 'lang::form']);
    });
    $this->mockService(SaveTransAction::class, static function (MockInterface $mock): void {
        $mock->allows('execute');
    });
    app('translator')->addLines(['form.fields.nested.label' => 'N'], 'it', 'lang');
    app()->setLocale('it');
    $field = TextInput::make('nested');
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
=======
<<<<<<< .merge_file_ZYE65J
=======
<<<<<<< .merge_file_CtdPUc
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
>>>>>>> laraxot/dev
    Assert::assertSame($field, (new AutoLabelExecuteNestedCaller())->execute($field, 'label'));
});

test('Post guid null titleForGuid uses random fallback', function (): void {
    $post = new PostNullTitleForGuidStub();
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
=======
<<<<<<< .merge_file_ZYE65J
=======
=======
    Assert::assertSame($field, (new AutoLabelExecuteNestedCaller)->execute($field, 'label'));
});

test('Post guid null titleForGuid uses random fallback', function (): void {
    $post = new PostNullTitleForGuidStub;
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
>>>>>>> laraxot/dev
    $guid = $post->getGuidAttribute(null);
    Assert::assertIsString($guid);
    Assert::assertNotSame('', $guid);
});

test('RouteServiceProvider covers missing supportedLocales key', function (): void {
    Config::set('laravellocalization', []);
    Assert::assertFalse(config()->has('laravellocalization.supportedLocales'));
    app()->instance('request', Request::create('http://localhost/it/page', 'GET'));
    (new RouteServiceProvider(app()))->registerLang();
    Assert::assertContains(app()->getLocale(), ['it', 'en']);
});

test('ThemeComposer non-string lang field returns empty string', function (): void {
    config([
        'laravellocalization.supportedLocales' => [
            'it' => ['name' => 'Italiano', 'regional' => 'it_IT'],
        ],
    ]);
    app()->setLocale('it');
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    $composer = new ThemeComposerNonStringFieldStub();
=======
<<<<<<< .merge_file_ZYE65J
    $composer = new ThemeComposerNonStringFieldStub();
=======
<<<<<<< .merge_file_CtdPUc
    $composer = new ThemeComposerNonStringFieldStub();
=======
    $composer = new ThemeComposerNonStringFieldStub;
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    $composer = new ThemeComposerNonStringFieldStub();
>>>>>>> laraxot/dev
    Assert::assertSame('', $composer->currentLang('name'));
    Assert::assertSame('it', $composer->currentLang('id'));
});

test('NationalFlagSelect casts non-array non-string localized label', function (): void {
    $this->mockService(AssetAction::class, static function (MockInterface $mock): void {
        $mock->allows(['execute' => '/f.svg']);
    });
    $translator = app('translator');
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    $mock = Mockery::mock($translator)->makePartial();
    $mock->shouldReceive('get')
        ->andReturnUsing(static function (string $key, array $replace = [], ?string $locale = null) use ($translator): mixed {
=======
<<<<<<< .merge_file_ZYE65J
    $mock = \Mockery::mock($translator)->makePartial();
    $mock->shouldReceive('get')
        ->andReturnUsing(static function (string $key, array $replace = [], ?string $locale = null) use ($translator): mixed {
=======
    $mock = Mockery::mock($translator)->makePartial();
    $mock->shouldReceive('get')
<<<<<<< .merge_file_CtdPUc
        ->andReturnUsing(static function (string $key, array $replace = [], ?string $locale = null) use ($translator): mixed {
=======
        ->andReturnUsing(static function (string $key, array $replace = [], ?string $locale = null) use ($translator): string|int|array {
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    $mock = Mockery::mock($translator)->makePartial();
    $mock->shouldReceive('get')
        ->andReturnUsing(static function (string $key, array $replace = [], ?string $locale = null) use ($translator): mixed {
>>>>>>> laraxot/dev
            if (str_contains($key, 'countries.it')) {
                return 99;
            }

            return $translator->get($key, $replace, $locale);
        });
    app()->instance('translator', $mock);
    app()->setLocale('it');

    $select = NationalFlagSelectFinalStub::make('c');
    $select->forcedCountries = [
        ['iso_3166_1_alpha2' => 'IT', 'name' => 'Italy'],
    ];
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    $m = new ReflectionMethod(NationalFlagSelect::class, 'getCountryOptions');
=======
<<<<<<< .merge_file_ZYE65J
    $m = new \ReflectionMethod(NationalFlagSelect::class, 'getCountryOptions');
=======
    $m = new ReflectionMethod(NationalFlagSelect::class, 'getCountryOptions');
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    $m = new ReflectionMethod(NationalFlagSelect::class, 'getCountryOptions');
>>>>>>> laraxot/dev
    $m->setAccessible(true);
    $options = $m->invoke($select);
    Assert::assertIsArray($options);
    Assert::assertArrayHasKey('IT', $options);
});

test('NationalFlagSelect finalizeFilteredCountries defensive continue', function (): void {
    $this->mockService(AssetAction::class, static function (MockInterface $mock): void {
        $mock->allows(['execute' => '/f.svg']);
    });
    $select = NationalFlagSelectFinalStub::make('c');
    $select->forcedCountries = [
        ['iso_3166_1_alpha2' => 'IT', 'name' => 'Italy'],
    ];
    $select->extraFilteredRows = [
        'not-an-array',
        ['iso_3166_1_alpha2' => null],
        ['name' => 'NoCode'],
    ];
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    $f = new ReflectionMethod(NationalFlagSelect::class, 'getFilteredCountryOptions');
=======
<<<<<<< .merge_file_ZYE65J
    $f = new \ReflectionMethod(NationalFlagSelect::class, 'getFilteredCountryOptions');
=======
    $f = new ReflectionMethod(NationalFlagSelect::class, 'getFilteredCountryOptions');
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    $f = new ReflectionMethod(NationalFlagSelect::class, 'getFilteredCountryOptions');
>>>>>>> laraxot/dev
    $f->setAccessible(true);
    $options = $f->invoke($select, 'ital');
    Assert::assertIsArray($options);
    Assert::assertArrayHasKey('IT', $options);
});

test('SaveTransAction early return when persist disabled in unit tests', function (): void {
    config(['lang.persist_trans_in_tests' => false]);
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    app()->instance(SaveTransAction::class, new SaveTransAction());
=======
<<<<<<< .merge_file_ZYE65J
    app()->instance(SaveTransAction::class, new SaveTransAction());
=======
<<<<<<< .merge_file_CtdPUc
    app()->instance(SaveTransAction::class, new SaveTransAction());
=======
    app()->instance(SaveTransAction::class, new SaveTransAction);
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    app()->instance(SaveTransAction::class, new SaveTransAction());
>>>>>>> laraxot/dev
    app(SaveTransAction::class)->execute('lang::should_not_write.nested', 'x');
    Assert::assertFileDoesNotExist(base_path('Modules/Lang/lang/'.app()->getLocale().'/should_not_write.php'));
    TestCase::forgetSaveTransActionOverride();
});

test('AutoLabelAction static caller covers class-only frame', function (): void {
    $this->mockService(GetTransKeyAction::class, static function (MockInterface $mock): void {
        $mock->allows(['execute' => 'lang::form']);
    });
    app('translator')->addLines(['form.fields.staticf.label' => 'S'], 'it', 'lang');
    app()->setLocale('it');
    $field = TextInput::make('staticf');
    Assert::assertSame($field, AutoLabelStaticCaller::run($field, 'label'));
});

test('NationalFlagSelect getCountryOptions casts int localized label', function (): void {
    $this->mockService(AssetAction::class, static function (MockInterface $mock): void {
        $mock->allows(['execute' => '/f.svg']);
    });
    app()->setLocale('it');
    $real = app('translator');
    Assert::assertInstanceOf(LaravelTranslator::class, $real);
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
=======
<<<<<<< .merge_file_ZYE65J
    app()->instance('translator', new class($real) {
        public function __construct(private LaravelTranslator $inner)
        {
        }

        /** @param array<string, mixed> $replace */
        public function get(string $key, array $replace = [], ?string $locale = null, bool $fallback = true): mixed
=======
>>>>>>> .merge_file_4xgoE1
=======
>>>>>>> laraxot/dev
    app()->instance('translator', new class($real)
    {
        public function __construct(private LaravelTranslator $inner) {}

<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
        /** @param array<string, mixed> $replace */
        public function get(string $key, array $replace = [], ?string $locale = null, bool $fallback = true): mixed
=======
<<<<<<< .merge_file_CtdPUc
        /** @param array<string, mixed> $replace */
        public function get(string $key, array $replace = [], ?string $locale = null, bool $fallback = true): mixed
=======
        /**
         * @param  array<string, mixed>  $replace
         * @return string|int|array<array-key, mixed>
         */
        public function get(string $key, array $replace = [], ?string $locale = null, bool $fallback = true): string|int|array
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
        /** @param array<string, mixed> $replace */
        public function get(string $key, array $replace = [], ?string $locale = null, bool $fallback = true): mixed
>>>>>>> laraxot/dev
        {
            if (str_contains($key, 'countries.it')) {
                return 77;
            }

            return $this->inner->get($key, $replace, $locale, $fallback);
        }

        /** @param list<mixed> $arguments */
        public function __call(string $name, array $arguments): mixed
        {
            return $this->inner->{$name}(...$arguments);
        }
    });

    $select = NationalFlagSelectFinalStub::make('c');
    $select->forcedCountries = [
        ['iso_3166_1_alpha2' => 'IT', 'name' => 'Italy'],
    ];
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    $m = new ReflectionMethod(NationalFlagSelect::class, 'getCountryOptions');
=======
<<<<<<< .merge_file_ZYE65J
    $m = new \ReflectionMethod(NationalFlagSelect::class, 'getCountryOptions');
=======
    $m = new ReflectionMethod(NationalFlagSelect::class, 'getCountryOptions');
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    $m = new ReflectionMethod(NationalFlagSelect::class, 'getCountryOptions');
>>>>>>> laraxot/dev
    $m->setAccessible(true);
    $options = $m->invoke($select);
    Assert::assertIsArray($options);
    Assert::assertArrayHasKey('IT', $options);
});

test('NationalFlagSelect getCountryOptions array localized label branch', function (): void {
    $this->mockService(AssetAction::class, static function (MockInterface $mock): void {
        $mock->allows(['execute' => '/f.svg']);
    });
    app()->setLocale('it');
    $real = app('translator');
    Assert::assertInstanceOf(LaravelTranslator::class, $real);
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
=======
<<<<<<< .merge_file_ZYE65J
    app()->instance('translator', new class($real) {
        public function __construct(private LaravelTranslator $inner)
        {
        }

        /** @param array<string, mixed> $replace */
        public function get(string $key, array $replace = [], ?string $locale = null, bool $fallback = true): mixed
=======
>>>>>>> .merge_file_4xgoE1
=======
>>>>>>> laraxot/dev
    app()->instance('translator', new class($real)
    {
        public function __construct(private LaravelTranslator $inner) {}

<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
        /** @param array<string, mixed> $replace */
        public function get(string $key, array $replace = [], ?string $locale = null, bool $fallback = true): mixed
=======
<<<<<<< .merge_file_CtdPUc
        /** @param array<string, mixed> $replace */
        public function get(string $key, array $replace = [], ?string $locale = null, bool $fallback = true): mixed
=======
        /**
         * @param  array<string, mixed>  $replace
         * @return string|array<array-key, mixed>
         */
        public function get(string $key, array $replace = [], ?string $locale = null, bool $fallback = true): string|array
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
        /** @param array<string, mixed> $replace */
        public function get(string $key, array $replace = [], ?string $locale = null, bool $fallback = true): mixed
>>>>>>> laraxot/dev
        {
            if (str_contains($key, 'countries.it')) {
                return ['n' => 'Italia'];
            }

            return $this->inner->get($key, $replace, $locale, $fallback);
        }

        /** @param list<mixed> $arguments */
        public function __call(string $name, array $arguments): mixed
        {
            return $this->inner->{$name}(...$arguments);
        }
    });

    $select = NationalFlagSelectFinalStub::make('c');
    $select->forcedCountries = [
        ['iso_3166_1_alpha2' => 'IT', 'name' => 'Italy'],
    ];
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    $m = new ReflectionMethod(NationalFlagSelect::class, 'getCountryOptions');
=======
<<<<<<< .merge_file_ZYE65J
    $m = new \ReflectionMethod(NationalFlagSelect::class, 'getCountryOptions');
=======
    $m = new ReflectionMethod(NationalFlagSelect::class, 'getCountryOptions');
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    $m = new ReflectionMethod(NationalFlagSelect::class, 'getCountryOptions');
>>>>>>> laraxot/dev
    $m->setAccessible(true);
    $options = $m->invoke($select);
    Assert::assertIsArray($options);
    Assert::assertArrayHasKey('IT', $options);
});

test('WriteTranslationFileAction putTranslationFile returns false when write fails', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    $action = new WriteTranslationFileActionWriteFailStub();
    $m = new ReflectionMethod(WriteTranslationFileAction::class, 'putTranslationFile');
=======
<<<<<<< .merge_file_ZYE65J
    $action = new WriteTranslationFileActionWriteFailStub();
    $m = new \ReflectionMethod(WriteTranslationFileAction::class, 'putTranslationFile');
=======
<<<<<<< .merge_file_CtdPUc
    $action = new WriteTranslationFileActionWriteFailStub();
=======
    $action = new WriteTranslationFileActionWriteFailStub;
>>>>>>> .merge_file_LlUNeP
    $m = new ReflectionMethod(WriteTranslationFileAction::class, 'putTranslationFile');
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    $action = new WriteTranslationFileActionWriteFailStub();
    $m = new ReflectionMethod(WriteTranslationFileAction::class, 'putTranslationFile');
>>>>>>> laraxot/dev
    $m->setAccessible(true);
    $dir = sys_get_temp_dir().'/lang_put_false_'.uniqid();
    $path = $dir.'/x.php';
    Assert::assertFalse($m->invoke($action, $path, '<?php return [];'));
});

test('WriteTranslationFileAction putTranslationFile edge paths', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    app()->instance('cache', new class()
    {
        public function flush(): void {}
=======
<<<<<<< .merge_file_ZYE65J
    app()->instance('cache', new class {
        public function flush(): void
        {
        }
=======
<<<<<<< .merge_file_CtdPUc
    app()->instance('cache', new class()
=======
    app()->instance('cache', new class
>>>>>>> .merge_file_LlUNeP
    {
        public function flush(): void {}
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    app()->instance('cache', new class()
    {
        public function flush(): void {}
>>>>>>> laraxot/dev
    });

    $missingDir = sys_get_temp_dir().'/lang_wfa_dir_'.uniqid();
    $path = $missingDir.'/out.php';
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    Assert::assertTrue((new WriteTranslationFileAction())->execute($path, ['a' => '1']));
=======
<<<<<<< .merge_file_ZYE65J
    Assert::assertTrue((new WriteTranslationFileAction())->execute($path, ['a' => '1']));
=======
<<<<<<< .merge_file_CtdPUc
    Assert::assertTrue((new WriteTranslationFileAction())->execute($path, ['a' => '1']));
=======
    Assert::assertTrue((new WriteTranslationFileAction)->execute($path, ['a' => '1']));
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    Assert::assertTrue((new WriteTranslationFileAction())->execute($path, ['a' => '1']));
>>>>>>> laraxot/dev
    Assert::assertFileExists($path);

    $path3 = sys_get_temp_dir().'/lang_wfa_wf_'.uniqid().'.php';
    TestCase::createTranslationFile($path3, ['c' => '1']);
<<<<<<< HEAD
<<<<<<< .merge_file_j7iRhn
    expect(fn () => (new WriteTranslationFileActionWriteFailStub())->execute($path3, ['c' => '2']))
=======
<<<<<<< .merge_file_ZYE65J
    expect(fn () => (new WriteTranslationFileActionWriteFailStub())->execute($path3, ['c' => '2']))
=======
<<<<<<< .merge_file_CtdPUc
    expect(fn () => (new WriteTranslationFileActionWriteFailStub())->execute($path3, ['c' => '2']))
=======
    expect(fn () => (new WriteTranslationFileActionWriteFailStub)->execute($path3, ['c' => '2']))
>>>>>>> .merge_file_LlUNeP
>>>>>>> .merge_file_CoCwBi
>>>>>>> .merge_file_4xgoE1
=======
    expect(fn () => (new WriteTranslationFileActionWriteFailStub())->execute($path3, ['c' => '2']))
>>>>>>> laraxot/dev
        ->toThrow(\Exception::class);

    foreach ([$path, $path3] as $f) {
        if (is_file($f)) {
            unlink($f);
        }
    }
    if (is_dir($missingDir)) {
        rmdir($missingDir);
    }
});
