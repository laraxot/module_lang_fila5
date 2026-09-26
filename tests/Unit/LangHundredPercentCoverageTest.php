<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Unit;

use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Translation\ArrayLoader;
use Illuminate\View\View;
use Livewire\Livewire;
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
use Mockery;
=======
<<<<<<< .merge_file_b5pEBu
=======
<<<<<<< .merge_file_zA4CJB
=======
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
>>>>>>> .merge_file_aWv0C1
use Mockery;
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
use Mockery;
>>>>>>> laraxot/dev
use Mockery\MockInterface;
use Modules\Lang\Actions\Filament\AutoLabelAction;
use Modules\Lang\Actions\GetAllModuleTranslationAction;
use Modules\Lang\Actions\GetAllTranslationAction;
use Modules\Lang\Actions\GetTransPathAction;
use Modules\Lang\Actions\PublishTranslationAction;
use Modules\Lang\Actions\ReadTranslationFileAction;
use Modules\Lang\Actions\SaveTransAction;
use Modules\Lang\Actions\SyncTranslationsAction;
use Modules\Lang\Actions\TransArrayAction;
use Modules\Lang\Actions\TransCollectionAction;
use Modules\Lang\Actions\Translation\RecordMissingTranslationAction;
use Modules\Lang\Actions\TranslatorAction;
use Modules\Lang\Actions\WriteTranslationFileAction;
use Modules\Lang\Adapters\TranslatorAdapter;
use Modules\Lang\Casts\LangField;
use Modules\Lang\Datas\TranslationData;
use Modules\Lang\Filament\Actions\LocaleSwitcherRefresh;
use Modules\Lang\Filament\Forms\Components\NationalFlagSelect;
use Modules\Lang\Filament\Forms\Components\TranslationEditor;
use Modules\Lang\Filament\Resources\LangBaseResource;
use Modules\Lang\Filament\Resources\Pages\LangBaseCreateRecord;
use Modules\Lang\Filament\Resources\Pages\LangBaseEditRecord;
use Modules\Lang\Filament\Resources\Pages\LangBaseListRecords;
use Modules\Lang\Filament\Resources\Pages\LangBaseViewRecord;
use Modules\Lang\Filament\Resources\TranslationFileResource;
use Modules\Lang\Filament\Resources\TranslationFileResource\Pages\EditTranslationFile;
use Modules\Lang\Filament\Resources\TranslationFileResource\Pages\ListTranslationFiles;
use Modules\Lang\Filament\Resources\TranslationFileResource\Tables\TranslationFilesTable;
use Modules\Lang\Filament\Widgets\LanguageSwitcherWidget;
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
use Modules\Lang\Http\Livewire\Lang\Change as LangChange;
use Modules\Lang\Http\Livewire\Lang\Switcher as LangSwitcher;
=======
<<<<<<< .merge_file_b5pEBu
use Modules\Lang\Http\Livewire\Lang\Change as LangChange;
use Modules\Lang\Http\Livewire\Lang\Switcher as LangSwitcher;
=======
<<<<<<< .merge_file_zA4CJB
use Modules\Lang\Http\Livewire\Lang\Change as LangChange;
use Modules\Lang\Http\Livewire\Lang\Switcher as LangSwitcher;
=======
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
use Modules\Lang\Http\Livewire\Lang\Change as LangChange;
use Modules\Lang\Http\Livewire\Lang\Switcher as LangSwitcher;
>>>>>>> laraxot/dev
use Modules\Lang\Models\BaseModel;
use Modules\Lang\Models\BaseModelLang;
use Modules\Lang\Models\LanguageLine;
use Modules\Lang\Models\Policies\LangBasePolicy;
use Modules\Lang\Models\Policies\PostPolicy;
use Modules\Lang\Models\Policies\TranslationFilePolicy;
use Modules\Lang\Models\Policies\TranslationPolicy;
use Modules\Lang\Models\Post;
use Modules\Lang\Models\Traits\HasStrictTranslations;
use Modules\Lang\Models\Translation;
use Modules\Lang\Models\TranslationFile;
use Modules\Lang\Providers\LangServiceProvider;
use Modules\Lang\Providers\RouteServiceProvider;
use Modules\Lang\Providers\TranslatorTraitPhpstanProbe;
use Modules\Lang\Tests\TestCase;
use Modules\Lang\View\Components\LanguageSwitcher;
use Modules\Lang\View\Composers\ThemeComposer;
use Modules\Xot\Actions\Arr\SaveArrayAction;
use Modules\Xot\Actions\File\AssetAction;
use Modules\Xot\Actions\File\SvgExistsAction;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Contracts\UserContract;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
use ReflectionMethod;
=======
<<<<<<< .merge_file_b5pEBu
=======
use ReflectionMethod;
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
use ReflectionMethod;
>>>>>>> laraxot/dev

use function Safe\fclose;
use function Safe\file_put_contents;
use function Safe\fopen;
use function Safe\getmypid;
use function Safe\mkdir;
use function Safe\rmdir;
use function Safe\touch;
use function Safe\unlink;

uses(TestCase::class);

final class LangBaseResourceStub extends LangBaseResource
{
    protected static ?string $model = TranslationFile::class;
}

final class LangBaseCreateRecordStub extends LangBaseCreateRecord
{
    protected static string $resource = TranslationFileResource::class;
}

final class LangBaseEditRecordStub extends LangBaseEditRecord
{
    protected static string $resource = TranslationFileResource::class;
}

final class LangBaseListRecordsStub extends LangBaseListRecords
{
    protected static string $resource = TranslationFileResource::class;
}

final class LangBaseViewRecordStub extends LangBaseViewRecord
{
    protected static string $resource = TranslationFileResource::class;
}

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
final class LangBasePolicyStub extends LangBasePolicy {}
=======
<<<<<<< .merge_file_b5pEBu
final class LangBasePolicyStub extends LangBasePolicy
{
}
=======
final class LangBasePolicyStub extends LangBasePolicy {}
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
final class LangBasePolicyStub extends LangBasePolicy {}
>>>>>>> laraxot/dev

final class LangFieldHostModel extends BaseModelLang
{
    public $timestamps = false;
}

final class TranslationEditorStub extends TranslationEditor
{
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
=======
<<<<<<< .merge_file_b5pEBu
=======
<<<<<<< .merge_file_zA4CJB
=======
    /**
     * `mixed` voluto: lo stato Filament forzato e' eterogeneo per i rami coperti
     * (array, stringa, null). Il tipo nativo riflette il contratto di getState().
     */
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
>>>>>>> laraxot/dev
    public mixed $forcedState = [];

    public function getState(): mixed
    {
        return $this->forcedState;
    }
}

final class StrictTranslationsHost extends BaseModel
{
    use HasStrictTranslations;

    /** @var list<string> */
    public array $translatable = ['title'];

    public $timestamps = false;

    protected $guarded = [];

    protected $table = 'translations';

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
    public mixed $forcedTranslation = null;

=======
<<<<<<< .merge_file_b5pEBu
    public mixed $forcedTranslation = null;

=======
<<<<<<< .merge_file_zA4CJB
    public mixed $forcedTranslation = null;

=======
    /**
     * `mixed` voluto: i test forzano traduzioni di tipo arbitrario (int, array, bool)
     * per coprire tutti i rami di normalizzazione di getTranslation().
     */
    public mixed $forcedTranslation = null;

    /**
     * Firma speculare a `HasTranslations::getTranslation(): mixed` — i parametri
     * restano invariati, il ritorno e' eterogeneo per contratto spatie.
     */
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
    public mixed $forcedTranslation = null;

>>>>>>> laraxot/dev
    protected function spatieGetTranslation(string $key, string $locale, bool $useFallbackLocale = true): mixed
    {
        unset($key, $locale, $useFallbackLocale);

        return $this->forcedTranslation;
    }
}

/**
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
 * @param  list<string>  $permissions
=======
<<<<<<< .merge_file_b5pEBu
 * @param list<string> $permissions
 *
=======
 * @param  list<string>  $permissions
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
 * @param  list<string>  $permissions
>>>>>>> laraxot/dev
 * @return MockInterface&UserContract
 */
function langHundredFakeUser(array $permissions = [], bool $superAdmin = false): UserContract
{
    /** @var MockInterface&UserContract $user */
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
    $user = Mockery::mock(UserContract::class);
=======
<<<<<<< .merge_file_b5pEBu
    $user = \Mockery::mock(UserContract::class);
=======
    $user = Mockery::mock(UserContract::class);
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
    $user = Mockery::mock(UserContract::class);
>>>>>>> laraxot/dev
    $user->shouldReceive('hasRole')->with('super-admin')->andReturn($superAdmin);
    $user->shouldReceive('hasPermissionTo')
        ->andReturnUsing(static fn (string $permission): bool => in_array($permission, $permissions, true));

    return $user;
}

/**
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
=======
<<<<<<< .merge_file_b5pEBu
=======
<<<<<<< .merge_file_zA4CJB
=======
 * `mixed ...$values` voluto: helper per costruire collezioni di valori eterogenei.
 *
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
>>>>>>> laraxot/dev
 * @return Collection<int|string, mixed>
 */
function langMixedCollection(mixed ...$values): Collection
{
    return new Collection($values);
}

function langForceSqliteTranslations(): void
{
    $database = sys_get_temp_dir().'/lang_cov_'.getmypid().'_'.uniqid('', true).'.sqlite';
    if (file_exists($database)) {
        unlink($database);
    }
    touch($database);

    config([
        'database.connections.lang' => [
            'driver' => 'sqlite',
            'database' => $database,
            'prefix' => '',
            'foreign_key_constraints' => false,
        ],
    ]);
    DB::purge('lang');
    DB::reconnect('lang');

    Schema::connection('lang')->dropIfExists('translations');
    Schema::connection('lang')->create('translations', static function (Blueprint $table): void {
        $table->id();
        $table->string('lang')->nullable();
        $table->string('namespace')->nullable();
        $table->string('group')->nullable();
        $table->string('item')->nullable();
        $table->text('value')->nullable();
        $table->timestamps();
    });

    // Stash path for cleanup after the test.
    $GLOBALS['__lang_cov_sqlite'] = $database;
}

afterEach(function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
    Mockery::close();
=======
<<<<<<< .merge_file_b5pEBu
    \Mockery::close();
=======
    Mockery::close();
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
    Mockery::close();
>>>>>>> laraxot/dev
    config(['lang.language_switcher.enabled' => true]);

    $sqlite = $GLOBALS['__lang_cov_sqlite'] ?? null;
    if (is_string($sqlite)) {
        DB::purge('lang');
        if (file_exists($sqlite)) {
            unlink($sqlite);
        }
        unset($GLOBALS['__lang_cov_sqlite']);
    }
});

describe('Lang 100% — Actions zero-coverage', function (): void {
    test('GetAllModuleTranslationAction and GetAllTranslationAction honor session locale and skip non-strings', function (): void {
        session()->put('locale', 'en');
        app()->setLocale('it');

        $sample = base_path('Modules/Lang/lang/en/auth.php');
        File::shouldReceive('glob')->andReturn([42, $sample])->byDefault();

        $moduleRows = app(GetAllModuleTranslationAction::class)->execute();
        $allRows = app(GetAllTranslationAction::class)->execute();

        Assert::assertSame('en', app()->getLocale());
        Assert::assertNotEmpty($moduleRows);
        Assert::assertSame($moduleRows[0]['path'], $sample);
        Assert::assertNotEmpty($allRows);
        Assert::assertStringContainsString('lang::', $allRows[0]['key']);
    });

    test('PublishTranslationAction writes when item value changes', function (): void {
        $dir = sys_get_temp_dir().'/lang_pub_'.uniqid();
        mkdir($dir.'/it', 0o755, true);
        $file = $dir.'/it/messages.php';
        TestCase::createTranslationFile($file, ['welcome' => 'old']);

        $data = TranslationData::from([
            'lang' => 'it',
            'namespace' => 'tenant',
            'group' => 'messages',
            'item' => 'welcome',
            'value' => 'new',
            'filename' => $file,
        ]);

        app(PublishTranslationAction::class)->execute($data);

        /** @var array<string, mixed> $loaded */
        $loaded = require $file;
        Assert::assertSame('new', $loaded['welcome']);

        unlink($file);
        rmdir($dir.'/it');
        rmdir($dir);
    });

    test('PublishTranslationAction skips write when data unchanged', function (): void {
        $dir = sys_get_temp_dir().'/lang_pub2_'.uniqid();
        mkdir($dir.'/it', 0o755, true);
        $file = $dir.'/it/messages.php';
        TestCase::createTranslationFile($file, ['welcome' => 'same']);

        $data = TranslationData::from([
            'lang' => 'it',
            'namespace' => 'tenant',
            'group' => 'messages',
            'item' => 'welcome',
            'value' => 'same',
            'filename' => $file,
        ]);

        $this->mockService(SaveArrayAction::class, static function (MockInterface $mock): void {
            $mock->shouldReceive('execute')->never();
        });

        app(PublishTranslationAction::class)->execute($data);

        unlink($file);
        rmdir($dir.'/it');
        rmdir($dir);
    });

    test('SaveTransAction creates missing file and sets nested key', function (): void {
        TestCase::bindRealSaveTransAction();
        $file = sys_get_temp_dir().'/lang_save_cov_'.uniqid().'.php';
        $this->mockService(GetTransPathAction::class, static function (MockInterface $mock) use ($file): void {
            $mock->allows(['execute' => $file]);
        });

        try {
            app(SaveTransAction::class)->execute('lang::tmpcov.nested.key', 'val');

            Assert::assertFileExists($file);
            /** @var array<string, mixed> $loaded */
            $loaded = require $file;
            Assert::assertIsArray($loaded['nested']);
            Assert::assertSame('val', $loaded['nested']['key']);
        } finally {
            if (file_exists($file)) {
                unlink($file);
            }
            TestCase::forgetSaveTransActionOverride();
        }
    });

    test('SaveTransAction replaces whole content when piece empty', function (): void {
        TestCase::bindRealSaveTransAction();
        $file = sys_get_temp_dir().'/lang_save_root_'.uniqid().'.php';
        TestCase::createTranslationFile($file, ['a' => '1']);
        $this->mockService(GetTransPathAction::class, static function (MockInterface $mock) use ($file): void {
            $mock->allows(['execute' => $file]);
        });

        try {
            expect(fn () => app(SaveTransAction::class)->execute('lang::tmproot', 'not-array'))
                ->toThrow(\Exception::class);
        } finally {
            if (file_exists($file)) {
                unlink($file);
            }
            TestCase::forgetSaveTransActionOverride();
        }
    });

    test('RecordMissingTranslationAction parses namespace and plain keys', function (): void {
        langForceSqliteTranslations();

        app(RecordMissingTranslationAction::class)->execute('lang::group.item', 'it');
        app(RecordMissingTranslationAction::class)->execute('plain.key', 'en');
        app(RecordMissingTranslationAction::class)->execute('lonely', 'de');

        Assert::assertSame(3, Translation::query()->count());
        Assert::assertTrue(Translation::query()->where('namespace', 'lang')->where('group', 'group')->where('item', 'item')->exists());
        Assert::assertTrue(Translation::query()->where('namespace', '*')->where('group', 'plain')->where('item', 'key')->exists());
        Assert::assertTrue(Translation::query()->where('namespace', '*')->where('group', 'lonely')->whereNull('item')->exists());
    });

    test('TranslatorAction and TranslatorAdapter cover missing keys and array results', function (): void {
        langForceSqliteTranslations();

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $loader = new ArrayLoader();
=======
<<<<<<< .merge_file_b5pEBu
        $loader = new ArrayLoader();
=======
<<<<<<< .merge_file_zA4CJB
        $loader = new ArrayLoader();
=======
        $loader = new ArrayLoader;
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $loader = new ArrayLoader();
>>>>>>> laraxot/dev
        $loader->addMessages('it', 'messages', [
            'known' => 'Ciao',
            'tree' => ['a' => 'b'],
            'num' => 7,
        ]);

        $action = new TranslatorAction($loader, 'it');
        Assert::assertSame('Ciao', $action->get('messages.known'));
        Assert::assertSame(['a' => 'b'], $action->get('messages.tree'));
        Assert::assertSame('messages.num', $action->get('messages.num'));
        $missingKey = 'messages.missing_'.uniqid('', true);
        Assert::assertSame($missingKey, $action->get($missingKey));
        $action->execute();

        $adapter = new TranslatorAdapter($loader, 'it');
        Assert::assertSame('Ciao', $adapter->get('messages.known'));
        Assert::assertSame(['a' => 'b'], $adapter->get('messages.tree'));
        $adapterMissingKey = 'messages.missing_'.uniqid('', true);
        Assert::assertSame($adapterMissingKey, $adapter->get($adapterMissingKey));
        Assert::assertGreaterThan(0, Translation::query()->count());
    });

    test('WriteTranslationFileAction backs up existing files and flushes translation loader', function (): void {
        $path = sys_get_temp_dir().'/lang_write_cov_'.uniqid().'.php';
        TestCase::createTranslationFile($path, ['old' => '1']);

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
=======
<<<<<<< .merge_file_b5pEBu
        app()->instance('cache', new class {
            public function flush(): void
            {
            }
        });
        $translationLoader = new class {
=======
<<<<<<< .merge_file_zA4CJB
>>>>>>> .merge_file_E1lPtT
=======
>>>>>>> laraxot/dev
        app()->instance('cache', new class()
        {
            public function flush(): void {}
        });
        $translationLoader = new class()
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        {
=======
=======
        app()->instance('cache', new class
        {
            public function flush(): void {}
        });
        $translationLoader = new class
>>>>>>> .merge_file_aWv0C1
        {
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        {
>>>>>>> laraxot/dev
            public bool $flushed = false;

            public function flush(): void
            {
                $this->flushed = true;
            }
        };
        app()->instance('translation.loader', $translationLoader);

        try {
            Assert::assertTrue(app(WriteTranslationFileAction::class)->execute($path, ['new' => '2']));
            Assert::assertFileExists($path);
            /** @var array<string, mixed> $loaded */
            $loaded = require $path;
            Assert::assertSame('2', $loaded['new']);
            Assert::assertTrue($translationLoader->flushed);
        } finally {
            if (file_exists($path)) {
                unlink($path);
            }
        }
    });

    test('WriteTranslationFileAction rejects invalid php syntax', function (): void {
        $path = sys_get_temp_dir().'/lang_bad_'.uniqid().'.php';
        $action = app(WriteTranslationFileAction::class);

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $read = Mockery::mock(ReadTranslationFileAction::class);
=======
<<<<<<< .merge_file_b5pEBu
        $read = \Mockery::mock(ReadTranslationFileAction::class);
=======
        $read = Mockery::mock(ReadTranslationFileAction::class);
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $read = Mockery::mock(ReadTranslationFileAction::class);
>>>>>>> laraxot/dev
        $read->shouldReceive('toPhp')->andReturn('<?php return [;');
        app()->instance(ReadTranslationFileAction::class, $read);

        expect(fn () => $action->execute($path, ['x' => 'y']))->toThrow(\Exception::class);
    });

    test('SyncTranslationsAction covers skip paths nested merge and getModules', function (): void {
        $action = app(SyncTranslationsAction::class);

        $missing = $action->execute('it', ['en'], 'DefinitelyMissingModuleXyz');
        Assert::assertIsArray($missing);
        Assert::assertIsArray($missing['modules']);
        Assert::assertIsArray($missing['modules']['DefinitelyMissingModuleXyz']);
        Assert::assertSame('skipped', $missing['modules']['DefinitelyMissingModuleXyz']['status']);

        $tmpModule = 'LangCovTmp'.uniqid();
        $base = base_path('Modules/'.$tmpModule);
        mkdir($base.'/lang/it', 0o755, true);
        file_put_contents($base.'/lang/it/empty.php', "<?php\n\nreturn [];\n");
        file_put_contents($base.'/lang/it/nested.php', "<?php\n\nreturn ['a' => ['b' => '1'], 'c' => '2'];\n");

        try {
            $done = $action->execute('xx', ['en'], $tmpModule);
            Assert::assertIsArray($done);
            Assert::assertIsArray($done['modules']);
            Assert::assertIsArray($done['modules'][$tmpModule]);
            Assert::assertSame('skipped', $done['modules'][$tmpModule]['status']);

            $synced = $action->execute('it', ['en'], $tmpModule);
            Assert::assertIsArray($synced);
            Assert::assertIsArray($synced['modules']);
            Assert::assertIsArray($synced['modules'][$tmpModule]);
            Assert::assertSame('completed', $synced['modules'][$tmpModule]['status']);
            Assert::assertFileExists($base.'/lang/en/nested.php');

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
            $getModules = new ReflectionMethod($action, 'getModules');
=======
<<<<<<< .merge_file_b5pEBu
            $getModules = new \ReflectionMethod($action, 'getModules');
=======
            $getModules = new ReflectionMethod($action, 'getModules');
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
            $getModules = new ReflectionMethod($action, 'getModules');
>>>>>>> laraxot/dev
            $getModules->setAccessible(true);
            /** @var list<string> $modules */
            $modules = $getModules->invoke($action, base_path('Modules'));
            Assert::assertContains('Lang', $modules);
        } finally {
            File::deleteDirectory($base);
        }

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $load = new ReflectionMethod($action, 'loadTranslations');
=======
<<<<<<< .merge_file_b5pEBu
        $load = new \ReflectionMethod($action, 'loadTranslations');
=======
        $load = new ReflectionMethod($action, 'loadTranslations');
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $load = new ReflectionMethod($action, 'loadTranslations');
>>>>>>> laraxot/dev
        $load->setAccessible(true);
        Assert::assertSame([], $load->invoke($action, '/no/such/file.php'));

        $broken = sys_get_temp_dir().'/lang_broken_'.uniqid().'.php';
        file_put_contents($broken, '<?php throw new Exception("boom");');
        Assert::assertSame([], $load->invoke($action, $broken));
        unlink($broken);

        $nonArray = sys_get_temp_dir().'/lang_nonarray_'.uniqid().'.php';
        file_put_contents($nonArray, "<?php\nreturn 'x';\n");
        Assert::assertSame([], $load->invoke($action, $nonArray));
        unlink($nonArray);
    });

    test('TransArrayAction and TransCollectionAction hit label and underscore branches', function (): void {
        app('translator')->addLines([
            'cov.foo.label' => 'Etichetta',
            'cov.bar_baz' => 'Underscore',
            'col.hello' => 'Ciao',
            'col.x_y' => 'XY',
        ], 'it');
        app()->setLocale('it');

        $arrayAction = app(TransArrayAction::class);
        Assert::assertSame([''], $arrayAction->execute([''], 'cov'));
        Assert::assertSame(['0'], $arrayAction->execute(['0'], 'cov'));
        Assert::assertSame(['Etichetta'], $arrayAction->execute(['foo'], 'cov'));
        Assert::assertSame(['Underscore'], $arrayAction->execute(['bar.baz'], 'cov'));
        Assert::assertSame(['missing'], $arrayAction->execute(['missing'], 'cov'));

        $colAction = app(TransCollectionAction::class);
        $empty = $colAction->execute(langMixedCollection(''), 'col');
        Assert::assertSame([''], $empty->all());
        Assert::assertSame(['Ciao'], $colAction->execute(langMixedCollection('hello'), 'col')->all());
        Assert::assertSame(['XY'], $colAction->execute(langMixedCollection('x.y'), 'col')->all());
        Assert::assertSame(['z'], $colAction->execute(langMixedCollection('z'), 'col')->all());
    });

    test('AutoLabelAction covers section step action icon and helperText branches', function (): void {
        $this->mockService(GetTransKeyAction::class, static function (MockInterface $mock): void {
            $mock->allows(['execute' => 'lang::autolabel']);
        });
        $this->mockService(SaveTransAction::class, static function (MockInterface $mock): void {
            $mock->allows('execute');
        });
        $this->mockService(SvgExistsAction::class, static function (MockInterface $mock): void {
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
            $mock->allows('execute')->andReturnUsing(static fn (string $label): bool => $label === 'heroicon-o-check');
=======
<<<<<<< .merge_file_b5pEBu
            $mock->allows('execute')->andReturnUsing(static fn (string $label): bool => 'heroicon-o-check' === $label);
=======
            $mock->allows('execute')->andReturnUsing(static fn (string $label): bool => $label === 'heroicon-o-check');
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
            $mock->allows('execute')->andReturnUsing(static fn (string $label): bool => $label === 'heroicon-o-check');
>>>>>>> laraxot/dev
        });

        app('translator')->addLines([
            'lang.autolabel.fields.title.label' => 'Titolo',
            'lang.autolabel.sections.empty.heading' => 'Sezione',
            'lang.autolabel.steps.one.label' => 'Passo',
            'lang.autolabel.actions.save.label' => 'Salva',
            'lang.autolabel.actions.save.icon' => 'heroicon-o-check',
            'lang.autolabel.actions.broken.icon' => 'missing-icon',
            'lang.autolabel.fields.help.helper_text' => '<b>aiuto</b>',
        ], 'it');
        app()->setLocale('it');

        $action = app(AutoLabelAction::class);

        $field = TextInput::make('title');
        Assert::assertSame($field, $action->execute($field, 'label'));

        $section = Section::make()->heading(null);
        Assert::assertSame($section, $action->execute($section, 'heading'));

        $save = Action::make('save');
        Assert::assertSame($save, $action->execute($save, 'label'));
        Assert::assertSame($save, $action->execute($save, 'icon'));

        $broken = Action::make('broken');
        Assert::assertSame($broken, $action->execute($broken, 'icon'));

        $help = TextInput::make('help');
        Assert::assertSame($help, $action->execute($help, 'helperText'));
    });
});

describe('Lang 100% — Filament / Livewire / Casts', function (): void {
    test('LangBaseResource stub exposes locales', function (): void {
        config(['app.locale' => 'it']);
        Assert::assertSame('it', LangBaseResourceStub::getDefaultTranslatableLocale());
        Assert::assertSame(['it', 'en'], LangBaseResourceStub::getTranslatableLocales());
    });

    test('LangBase page stubs expose header actions with locale switcher', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $create = new ReflectionMethod(LangBaseCreateRecordStub::class, 'getHeaderActions');
        $create->setAccessible(true);
=======
<<<<<<< .merge_file_b5pEBu
        $create = new \ReflectionMethod(LangBaseCreateRecordStub::class, 'getHeaderActions');
        $create->setAccessible(true);
        Assert::assertNotEmpty($create->invoke(new LangBaseCreateRecordStub()));

        $edit = new \ReflectionMethod(LangBaseEditRecordStub::class, 'getHeaderActions');
        $edit->setAccessible(true);
        $editActions = $edit->invoke(new LangBaseEditRecordStub());
        Assert::assertIsArray($editActions);
        Assert::assertArrayHasKey('locale-switcher', $editActions);

        $list = new \ReflectionMethod(LangBaseListRecordsStub::class, 'getHeaderActions');
        $list->setAccessible(true);
        $listActions = $list->invoke(new LangBaseListRecordsStub());
        Assert::assertIsArray($listActions);
        Assert::assertArrayHasKey('locale_switcher', $listActions);

        $view = new \ReflectionMethod(LangBaseViewRecordStub::class, 'getHeaderActions');
        $view->setAccessible(true);
        $viewActions = $view->invoke(new LangBaseViewRecordStub());
=======
        $create = new ReflectionMethod(LangBaseCreateRecordStub::class, 'getHeaderActions');
        $create->setAccessible(true);
<<<<<<< .merge_file_zA4CJB
>>>>>>> .merge_file_E1lPtT
=======
        $create = new ReflectionMethod(LangBaseCreateRecordStub::class, 'getHeaderActions');
        $create->setAccessible(true);
>>>>>>> laraxot/dev
        Assert::assertNotEmpty($create->invoke(new LangBaseCreateRecordStub()));

        $edit = new ReflectionMethod(LangBaseEditRecordStub::class, 'getHeaderActions');
        $edit->setAccessible(true);
        $editActions = $edit->invoke(new LangBaseEditRecordStub());
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
=======
=======
        Assert::assertNotEmpty($create->invoke(new LangBaseCreateRecordStub));

        $edit = new ReflectionMethod(LangBaseEditRecordStub::class, 'getHeaderActions');
        $edit->setAccessible(true);
        $editActions = $edit->invoke(new LangBaseEditRecordStub);
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_E1lPtT
=======
>>>>>>> laraxot/dev
        Assert::assertIsArray($editActions);
        Assert::assertArrayHasKey('locale-switcher', $editActions);

        $list = new ReflectionMethod(LangBaseListRecordsStub::class, 'getHeaderActions');
        $list->setAccessible(true);
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $listActions = $list->invoke(new LangBaseListRecordsStub());
=======
<<<<<<< .merge_file_zA4CJB
        $listActions = $list->invoke(new LangBaseListRecordsStub());
=======
        $listActions = $list->invoke(new LangBaseListRecordsStub);
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_E1lPtT
=======
        $listActions = $list->invoke(new LangBaseListRecordsStub());
>>>>>>> laraxot/dev
        Assert::assertIsArray($listActions);
        Assert::assertArrayHasKey('locale_switcher', $listActions);

        $view = new ReflectionMethod(LangBaseViewRecordStub::class, 'getHeaderActions');
        $view->setAccessible(true);
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $viewActions = $view->invoke(new LangBaseViewRecordStub());
=======
<<<<<<< .merge_file_zA4CJB
        $viewActions = $view->invoke(new LangBaseViewRecordStub());
=======
        $viewActions = $view->invoke(new LangBaseViewRecordStub);
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $viewActions = $view->invoke(new LangBaseViewRecordStub());
>>>>>>> laraxot/dev
        Assert::assertIsArray($viewActions);
        Assert::assertArrayHasKey('locale-switcher', $viewActions);
    });

    test('LocaleSwitcherRefresh setUp runs with session locale', function (): void {
        session()->put('locale', 'en');
        $action = LocaleSwitcherRefresh::make('locale');
        Assert::assertSame('en', $action->lang);
        Assert::assertNotSame('', $action->fullUrl);
    });

    test('LocaleSwitcherRefresh falls back when session locale invalid', function (): void {
        session()->forget('locale');
        $action = LocaleSwitcherRefresh::make('locale2');
        Assert::assertSame('it', $action->lang);
    });

    test('NationalFlagSelect builds options and filters search', function (): void {
        $this->mockService(AssetAction::class, static function (MockInterface $mock): void {
            $mock->allows(['execute' => '/flag.svg']);
        });

        $select = NationalFlagSelect::make('country');
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $optionsMethod = new ReflectionMethod($select, 'getCountryOptions');
=======
<<<<<<< .merge_file_b5pEBu
        $optionsMethod = new \ReflectionMethod($select, 'getCountryOptions');
=======
        $optionsMethod = new ReflectionMethod($select, 'getCountryOptions');
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $optionsMethod = new ReflectionMethod($select, 'getCountryOptions');
>>>>>>> laraxot/dev
        $optionsMethod->setAccessible(true);
        /** @var array<string, string> $options */
        $options = $optionsMethod->invoke($select);
        Assert::assertNotEmpty($options);

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $filterMethod = new ReflectionMethod($select, 'getFilteredCountryOptions');
=======
<<<<<<< .merge_file_b5pEBu
        $filterMethod = new \ReflectionMethod($select, 'getFilteredCountryOptions');
=======
        $filterMethod = new ReflectionMethod($select, 'getFilteredCountryOptions');
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $filterMethod = new ReflectionMethod($select, 'getFilteredCountryOptions');
>>>>>>> laraxot/dev
        $filterMethod->setAccessible(true);
        Assert::assertNotEmpty($filterMethod->invoke($select, ''));
        Assert::assertIsArray($filterMethod->invoke($select, 'ital'));
        Assert::assertIsArray($filterMethod->invoke($select, 'IT'));
    });

    test('TranslationEditor builds nested child components', function (): void {
        $editor = TranslationEditorStub::make('content');
        $editor->forcedState = [
            'title' => 'Hello',
            'meta' => ['description' => 'World'],
        ];
        Assert::assertCount(2, $editor->getDefaultChildComponents());

        $empty = TranslationEditorStub::make('empty');
        $empty->forcedState = 'nope';
        Assert::assertSame([], $empty->getDefaultChildComponents());
    });

    test('EditTranslationFile and ListTranslationFiles cover remaining methods', function (): void {
        $this->mockService(SaveTransAction::class, static function (MockInterface $mock): void {
            $mock->allows('execute');
        });

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
=======
<<<<<<< .merge_file_b5pEBu
>>>>>>> .merge_file_E1lPtT
=======
>>>>>>> laraxot/dev
        $edit = new EditTranslationFile();
        $schema = $edit->getFormSchema();
        Assert::assertNotEmpty($schema);

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $header = new ReflectionMethod($edit, 'getHeaderActions');
=======
        $header = new \ReflectionMethod($edit, 'getHeaderActions');
=======
<<<<<<< .merge_file_zA4CJB
        $edit = new EditTranslationFile();
=======
        $edit = new EditTranslationFile;
>>>>>>> .merge_file_aWv0C1
        $schema = $edit->getFormSchema();
        Assert::assertNotEmpty($schema);

        $header = new ReflectionMethod($edit, 'getHeaderActions');
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $header = new ReflectionMethod($edit, 'getHeaderActions');
>>>>>>> laraxot/dev
        $header->setAccessible(true);
        $headerActions = $header->invoke($edit);
        Assert::assertIsArray($headerActions);
        Assert::assertArrayHasKey('locale-switcher', $headerActions);

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
=======
>>>>>>> laraxot/dev
        $mutate = new ReflectionMethod($edit, 'mutateFormDataBeforeSave');
        $mutate->setAccessible(true);
        $record = new class() extends Model
        {
<<<<<<< HEAD
=======
<<<<<<< .merge_file_b5pEBu
        $mutate = new \ReflectionMethod($edit, 'mutateFormDataBeforeSave');
        $mutate->setAccessible(true);
        $record = new class extends Model {
=======
        $mutate = new ReflectionMethod($edit, 'mutateFormDataBeforeSave');
        $mutate->setAccessible(true);
<<<<<<< .merge_file_zA4CJB
        $record = new class() extends Model
=======
        $record = new class extends Model
>>>>>>> .merge_file_aWv0C1
        {
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
>>>>>>> laraxot/dev
            protected $guarded = [];
        };
        $record->forceFill(['key' => 'lang::messages']);
        $edit->record = $record;
        Assert::assertSame(['content' => ['a' => 'b']], $mutate->invoke($edit, ['content' => ['a' => 'b']]));
        Assert::assertSame(['content' => null], $mutate->invoke($edit, ['content' => null]));

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $editNoKey = new EditTranslationFile();
        $editNoKey->record = new class() extends Model
        {
=======
<<<<<<< .merge_file_b5pEBu
        $editNoKey = new EditTranslationFile();
        $editNoKey->record = new class extends Model {
=======
<<<<<<< .merge_file_zA4CJB
        $editNoKey = new EditTranslationFile();
        $editNoKey->record = new class() extends Model
=======
        $editNoKey = new EditTranslationFile;
        $editNoKey->record = new class extends Model
>>>>>>> .merge_file_aWv0C1
        {
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $editNoKey = new EditTranslationFile();
        $editNoKey->record = new class() extends Model
        {
>>>>>>> laraxot/dev
            protected $guarded = [];
        };
        Assert::assertSame(['x' => 1], $mutate->invoke($editNoKey, ['x' => 1]));

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
=======
>>>>>>> laraxot/dev
        $after = new ReflectionMethod($edit, 'afterSave');
        $after->setAccessible(true);
        $refreshable = new class() extends Model
        {
<<<<<<< HEAD
=======
<<<<<<< .merge_file_b5pEBu
        $after = new \ReflectionMethod($edit, 'afterSave');
        $after->setAccessible(true);
        $refreshable = new class extends Model {
=======
        $after = new ReflectionMethod($edit, 'afterSave');
        $after->setAccessible(true);
<<<<<<< .merge_file_zA4CJB
        $refreshable = new class() extends Model
=======
        $refreshable = new class extends Model
>>>>>>> .merge_file_aWv0C1
        {
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
>>>>>>> laraxot/dev
            public bool $refreshed = false;

            public function refresh(): static
            {
                $this->refreshed = true;

                return $this;
            }
        };
        $edit->record = $refreshable;
        $after->invoke($edit);
        Assert::assertTrue($refreshable->refreshed);

        $edit->record = null;
        $after->invoke($edit);

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $list = new ListTranslationFiles();
        $listHeader = new ReflectionMethod($list, 'getHeaderActions');
=======
<<<<<<< .merge_file_b5pEBu
        $list = new ListTranslationFiles();
        $listHeader = new \ReflectionMethod($list, 'getHeaderActions');
=======
<<<<<<< .merge_file_zA4CJB
        $list = new ListTranslationFiles();
=======
        $list = new ListTranslationFiles;
>>>>>>> .merge_file_aWv0C1
        $listHeader = new ReflectionMethod($list, 'getHeaderActions');
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $list = new ListTranslationFiles();
        $listHeader = new ReflectionMethod($list, 'getHeaderActions');
>>>>>>> laraxot/dev
        $listHeader->setAccessible(true);
        $listHeaderActions = $listHeader->invoke($list);
        Assert::assertIsArray($listHeaderActions);
        Assert::assertArrayHasKey('locale_switcher', $listHeaderActions);

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $table = new TranslationFilesTable();
=======
<<<<<<< .merge_file_b5pEBu
        $table = new TranslationFilesTable();
=======
<<<<<<< .merge_file_zA4CJB
        $table = new TranslationFilesTable();
=======
        $table = new TranslationFilesTable;
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $table = new TranslationFilesTable();
>>>>>>> laraxot/dev
        Assert::assertArrayHasKey('locale_switcher', $table->getTableHeaderActions());
    });

    test('LanguageSwitcherWidget covers changeLanguage urls and view data', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
=======
<<<<<<< .merge_file_b5pEBu
=======
<<<<<<< .merge_file_zA4CJB
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
>>>>>>> laraxot/dev
        $widget = new LanguageSwitcherWidget();
        $viewData = $widget->exposeViewData();
        Assert::assertArrayHasKey('available_locales', $viewData);
        $availableLocales = $viewData['available_locales'];
        Assert::assertInstanceOf(Collection::class, $availableLocales);
        Assert::assertCount(3, $availableLocales);

        app()->instance('request', Request::create('http://localhost/it/demo', 'GET'));
        app()->setLocale('it');
        Assert::assertStringContainsString('/en/', $widget->getLanguageUrl('en'));
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
=======
<<<<<<< .merge_file_b5pEBu
=======
=======
        $widget = new LanguageSwitcherWidget;
        $viewData = $widget->exposeViewData();
        Assert::assertArrayHasKey('available_locales', $viewData);
        Assert::assertArrayHasKey('lang', $viewData);
        Assert::assertArrayHasKey('langs', $viewData);
        $availableLocales = $viewData['available_locales'];
        Assert::assertInstanceOf(Collection::class, $availableLocales);
        $supportedCodes = array_keys(LaravelLocalization::getSupportedLocales());
        Assert::assertSame($supportedCodes, $availableLocales->pluck('code')->all());

        app()->instance('request', Request::create('http://localhost/it/demo', 'GET'));
        app()->setLocale('it');
        Assert::assertStringContainsString('en', $widget->getLanguageUrl('en'));
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
>>>>>>> laraxot/dev

        app()->instance('request', Request::create('http://localhost/it', 'GET'));
        Assert::assertStringContainsString('en', $widget->getLanguageUrl('en'));

        app()->instance('request', Request::create('http://localhost/', 'GET'));
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        Assert::assertStringContainsString('de', $widget->getLanguageUrl('de'));
=======
<<<<<<< .merge_file_b5pEBu
        Assert::assertStringContainsString('de', $widget->getLanguageUrl('de'));
=======
<<<<<<< .merge_file_zA4CJB
        Assert::assertStringContainsString('de', $widget->getLanguageUrl('de'));
=======
        Assert::assertSame('/de', $widget->getLanguageUrl('de'));
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        Assert::assertStringContainsString('de', $widget->getLanguageUrl('de'));
>>>>>>> laraxot/dev

        Livewire::test(LanguageSwitcherWidget::class)
            ->call('changeLanguage', 'en')
            ->assertRedirect();

        Livewire::test(LanguageSwitcherWidget::class)
            ->call('changeLanguage', 'xx');
    });

    test('LanguageSwitcher blade component empty branch when disabled', function (): void {
        config(['lang.language_switcher.enabled' => false]);
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $component = new LanguageSwitcher();
=======
<<<<<<< .merge_file_b5pEBu
        $component = new LanguageSwitcher();
=======
<<<<<<< .merge_file_zA4CJB
        $component = new LanguageSwitcher();
=======
        $component = new LanguageSwitcher;
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $component = new LanguageSwitcher();
>>>>>>> laraxot/dev
        $view = $component->render();
        Assert::assertInstanceOf(View::class, $view);
        Assert::assertSame('lang::components.empty', $view->name());
    });

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
=======
<<<<<<< .merge_file_b5pEBu
=======
<<<<<<< .merge_file_zA4CJB
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
>>>>>>> laraxot/dev
    test('Livewire Change and Switcher mount and render', function (): void {
        config([
            'laravellocalization.supportedLocales' => [
                'it' => ['name' => 'Italiano', 'script' => 'Latn', 'native' => 'Italiano', 'regional' => 'it_IT'],
                'en' => ['name' => 'English', 'script' => 'Latn', 'native' => 'English', 'regional' => 'en_GB'],
            ],
        ]);
        app()->setLocale('it');

        $change = new LangChange();
        $change->mount();
        Assert::assertSame('it', $change->lang);
        Assert::assertArrayHasKey('en', $change->langs);
        Assert::assertInstanceOf(View::class, $change->render());

        $switcher = new LangSwitcher();
        $switcher->mount();
        Assert::assertSame('it', $switcher->lang);
        Assert::assertInstanceOf(View::class, $switcher->render());
    });

    test('LangField cast get and set via host model', function (): void {
        $cast = new LangField();
        $host = new LangFieldHostModel();
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        /** @var Post&MockInterface $post */
        $post = Mockery::mock(Post::class)->makePartial();
=======
<<<<<<< .merge_file_b5pEBu
        /** @var Post&MockInterface $post */
        $post = \Mockery::mock(Post::class)->makePartial();
=======
=======
    test('retired HTTP Switcher and Change files no longer exist', function (): void {
        $httpLangDir = dirname(__DIR__, 2).'/app/Http/Livewire/Lang';
        Assert::assertFileDoesNotExist($httpLangDir.'/Change.php');
        Assert::assertFileDoesNotExist($httpLangDir.'/Switcher.php');
    });

    test('LangField cast get and set via host model', function (): void {
        $cast = new LangField;
        $host = new LangFieldHostModel;
>>>>>>> .merge_file_aWv0C1
        /** @var Post&MockInterface $post */
        $post = Mockery::mock(Post::class)->makePartial();
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        /** @var Post&MockInterface $post */
        $post = Mockery::mock(Post::class)->makePartial();
>>>>>>> laraxot/dev
        $initialTitle = ['it' => 'Hello'];
        $post->setAttribute('custom_field', $initialTitle);
        $post->shouldReceive('save')->once()->andReturnTrue();
        $host->setRelation('post', $post);

        Assert::assertSame($initialTitle, $cast->get($host, 'custom_field', null, []));
        $translatedTitle = ['it' => 'World'];
        Assert::assertSame([], $cast->set($host, 'custom_field', $translatedTitle, []));
        Assert::assertSame($translatedTitle, $post->getAttribute('custom_field'));
    });
});

describe('Lang 100% — Models policies providers views', function (): void {
    test('LanguageLine fillable and casts', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $line = new LanguageLine();
        Assert::assertSame(['group', 'key', 'text', 'locale'], $line->getFillable());
        $casts = new ReflectionMethod($line, 'casts');
=======
<<<<<<< .merge_file_b5pEBu
        $line = new LanguageLine();
        Assert::assertSame(['group', 'key', 'text', 'locale'], $line->getFillable());
        $casts = new \ReflectionMethod($line, 'casts');
=======
<<<<<<< .merge_file_zA4CJB
        $line = new LanguageLine();
=======
        $line = new LanguageLine;
>>>>>>> .merge_file_aWv0C1
        Assert::assertSame(['group', 'key', 'text', 'locale'], $line->getFillable());
        $casts = new ReflectionMethod($line, 'casts');
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $line = new LanguageLine();
        Assert::assertSame(['group', 'key', 'text', 'locale'], $line->getFillable());
        $casts = new ReflectionMethod($line, 'casts');
>>>>>>> laraxot/dev
        $casts->setAccessible(true);
        Assert::assertSame(['text' => 'json'], $casts->invoke($line));
    });

    test('HasStrictTranslations normalizes scalar array bool float and object', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $model = new StrictTranslationsHost();
=======
<<<<<<< .merge_file_b5pEBu
        $model = new StrictTranslationsHost();
=======
<<<<<<< .merge_file_zA4CJB
        $model = new StrictTranslationsHost();
=======
        $model = new StrictTranslationsHost;
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $model = new StrictTranslationsHost();
>>>>>>> laraxot/dev

        $model->forcedTranslation = 'Ciao';
        Assert::assertSame('Ciao', $model->getTranslation('title', 'it'));

        $model->forcedTranslation = 3;
        Assert::assertSame(3, $model->getTranslation('title', 'it'));

        $model->forcedTranslation = null;
        Assert::assertNull($model->getTranslation('title', 'it'));

        $model->forcedTranslation = ['nested' => 'x', 0 => 'skip'];
        Assert::assertSame(['nested' => 'x'], $model->getTranslation('title', 'en'));

        $model->forcedTranslation = true;
        Assert::assertSame(1, $model->getTranslation('title', 'de'));

        $model->forcedTranslation = 1.5;
        Assert::assertSame(1, $model->getTranslation('title', 'fr'));

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $model->forcedTranslation = new class()
        {
=======
<<<<<<< .merge_file_b5pEBu
        $model->forcedTranslation = new class {
=======
<<<<<<< .merge_file_zA4CJB
        $model->forcedTranslation = new class()
=======
        $model->forcedTranslation = new class
>>>>>>> .merge_file_aWv0C1
        {
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $model->forcedTranslation = new class()
        {
>>>>>>> laraxot/dev
            public function __toString(): string
            {
                return 'obj';
            }
        };
        Assert::assertSame('obj', $model->getTranslation('title', 'es'));

        $model->forcedTranslation = fopen('php://memory', 'r');
        Assert::assertNull($model->getTranslation('title', 'pt'));
        if (is_resource($model->forcedTranslation)) {
            fclose($model->forcedTranslation);
        }
    });

    test('policies cover all abilities and before null path', function (): void {
        $user = langHundredFakeUser([
            'translation.viewAny', 'translation.view', 'translation.create', 'translation.update',
            'translation.delete', 'translation.restore', 'translation.forceDelete',
            'post.viewAny', 'post.view', 'post.create', 'post.update', 'post.delete', 'post.restore', 'post.forceDelete',
            'translation_file.viewAny', 'translation_file.view', 'translation_file.create', 'translation_file.update',
            'translation_file.delete', 'translation_file.restore', 'translation_file.forceDelete',
        ]);
        $denied = langHundredFakeUser([]);

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
=======
<<<<<<< .merge_file_b5pEBu
=======
<<<<<<< .merge_file_zA4CJB
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
>>>>>>> laraxot/dev
        $translationPolicy = new TranslationPolicy();
        $postPolicy = new PostPolicy();
        $filePolicy = new TranslationFilePolicy();
        $base = new LangBasePolicyStub();

        Assert::assertNull($base->before($denied, 'viewAny'));
        Assert::assertTrue($translationPolicy->viewAny($user));
        Assert::assertTrue($translationPolicy->view($user, new Translation()));
        Assert::assertTrue($translationPolicy->create($user));
        Assert::assertTrue($translationPolicy->update($user, new Translation()));
        Assert::assertTrue($translationPolicy->delete($user, new Translation()));
        Assert::assertTrue($translationPolicy->restore($user, new Translation()));
        Assert::assertTrue($translationPolicy->forceDelete($user, new Translation()));
        Assert::assertFalse($translationPolicy->viewAny($denied));

        Assert::assertTrue($postPolicy->viewAny($user));
        Assert::assertTrue($postPolicy->view($user, new Post()));
        Assert::assertTrue($postPolicy->create($user));
        Assert::assertTrue($postPolicy->restore($user, new Post()));
        Assert::assertTrue($postPolicy->forceDelete($user, new Post()));

        Assert::assertTrue($filePolicy->viewAny($user));
        Assert::assertTrue($filePolicy->view($user, new TranslationFile()));
        Assert::assertTrue($filePolicy->create($user));
        Assert::assertTrue($filePolicy->update($user, new TranslationFile()));
        Assert::assertTrue($filePolicy->restore($user, new TranslationFile()));
        Assert::assertTrue($filePolicy->forceDelete($user, new TranslationFile()));
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
=======
<<<<<<< .merge_file_b5pEBu
=======
=======
        $translationPolicy = new TranslationPolicy;
        $postPolicy = new PostPolicy;
        $filePolicy = new TranslationFilePolicy;
        $base = new LangBasePolicyStub;

        Assert::assertNull($base->before($denied, 'viewAny'));
        Assert::assertTrue($translationPolicy->viewAny($user));
        Assert::assertTrue($translationPolicy->view($user, new Translation));
        Assert::assertTrue($translationPolicy->create($user));
        Assert::assertTrue($translationPolicy->update($user, new Translation));
        Assert::assertTrue($translationPolicy->delete($user, new Translation));
        Assert::assertTrue($translationPolicy->restore($user, new Translation));
        Assert::assertTrue($translationPolicy->forceDelete($user, new Translation));
        Assert::assertFalse($translationPolicy->viewAny($denied));

        Assert::assertTrue($postPolicy->viewAny($user));
        Assert::assertTrue($postPolicy->view($user, new Post));
        Assert::assertTrue($postPolicy->create($user));
        Assert::assertTrue($postPolicy->restore($user, new Post));
        Assert::assertTrue($postPolicy->forceDelete($user, new Post));

        Assert::assertTrue($filePolicy->viewAny($user));
        Assert::assertTrue($filePolicy->view($user, new TranslationFile));
        Assert::assertTrue($filePolicy->create($user));
        Assert::assertTrue($filePolicy->update($user, new TranslationFile));
        Assert::assertTrue($filePolicy->restore($user, new TranslationFile));
        Assert::assertTrue($filePolicy->forceDelete($user, new TranslationFile));
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
>>>>>>> laraxot/dev
        Assert::assertFalse($filePolicy->viewAny($denied));
    });

    test('Post linkable slug options and accessors without persistence', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $post = new Post();
=======
<<<<<<< .merge_file_b5pEBu
        $post = new Post();
=======
<<<<<<< .merge_file_zA4CJB
        $post = new Post();
=======
        $post = new Post;
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $post = new Post();
>>>>>>> laraxot/dev
        Assert::assertSame('guid', $post->getSlugOptions()->slugField);
        Assert::assertInstanceOf(MorphTo::class, $post->linkable());

        $post->setRawAttributes(['post_type' => 'article', 'post_id' => '9']);
        Assert::assertSame('article 9', $post->getTitleAttribute(null));

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $post2 = new Post();
=======
<<<<<<< .merge_file_b5pEBu
        $post2 = new Post();
=======
<<<<<<< .merge_file_zA4CJB
        $post2 = new Post();
=======
        $post2 = new Post;
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $post2 = new Post();
>>>>>>> laraxot/dev
        $post2->setRawAttributes([]);
        $post2->post_type = 'page';
        $post2->post_id = 3;
        Assert::assertSame('page 3', $post2->getTitleAttribute(null));

<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
=======
<<<<<<< .merge_file_b5pEBu
=======
<<<<<<< .merge_file_zA4CJB
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
>>>>>>> laraxot/dev
        $post3 = new Post();
        $post3->setRawAttributes(['title' => '']);
        Assert::assertIsString($post3->getGuidAttribute('bad value with spaces'));

        $post4 = new Post();
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
=======
<<<<<<< .merge_file_b5pEBu
=======
=======
        $post3 = new Post;
        $post3->setRawAttributes(['title' => '']);
        Assert::assertIsString($post3->getGuidAttribute('bad value with spaces'));

        $post4 = new Post;
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
>>>>>>> laraxot/dev
        $post4->setRawAttributes(['title' => '', 'post_type' => 'x', 'post_id' => 1]);
        Assert::assertSame('x-1', $post4->getGuidAttribute(null));
    });

    test('TranslationFile getRows ide-helper path and load failures', function (): void {
        $previousArgv = $_SERVER['argv'] ?? null;
        $_SERVER['argv'] = ['artisan', 'ide-helper:models'];
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        Assert::assertSame([], (new TranslationFile())->getRows());
=======
<<<<<<< .merge_file_b5pEBu
        Assert::assertSame([], (new TranslationFile())->getRows());
=======
<<<<<<< .merge_file_zA4CJB
        Assert::assertSame([], (new TranslationFile())->getRows());
=======
        Assert::assertSame([], (new TranslationFile)->getRows());
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        Assert::assertSame([], (new TranslationFile())->getRows());
>>>>>>> laraxot/dev
        $_SERVER['argv'] = $previousArgv;

        $this->mockService(GetAllTranslationAction::class, static function (MockInterface $mock): void {
            $mock->shouldReceive('execute')->andThrow(new \RuntimeException('boom'));
        });
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        Assert::assertSame([], (new TranslationFile())->getRows());
=======
<<<<<<< .merge_file_b5pEBu
        Assert::assertSame([], (new TranslationFile())->getRows());
=======
<<<<<<< .merge_file_zA4CJB
        Assert::assertSame([], (new TranslationFile())->getRows());
=======
        Assert::assertSame([], (new TranslationFile)->getRows());
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        expect((new TranslationFile())->getRows())->toBeEmpty();
>>>>>>> laraxot/dev

        $bad = sys_get_temp_dir().'/tf_bad_'.uniqid().'.php';
        file_put_contents($bad, '<?php throw new Exception("x");');
        $this->mockService(GetAllTranslationAction::class, static function (MockInterface $mock) use ($bad): void {
            $mock->shouldReceive('execute')->andReturn([
                ['key' => 'lang::bad', 'path' => $bad],
                ['key' => 'lang::missing', 'path' => '/no/file.php'],
                123,
            ]);
        });
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $rows = (new TranslationFile())->getRows();
=======
<<<<<<< .merge_file_b5pEBu
        $rows = (new TranslationFile())->getRows();
=======
<<<<<<< .merge_file_zA4CJB
        $rows = (new TranslationFile())->getRows();
=======
        $rows = (new TranslationFile)->getRows();
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $rows = (new TranslationFile())->getRows();
>>>>>>> laraxot/dev
        Assert::assertNotEmpty($rows);
        unlink($bad);
    });

    test('TranslationData throws when namespace missing or file not array', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
=======
<<<<<<< .merge_file_b5pEBu
        app()->instance('translator', new class {
            public function getLoader(): object
            {
                return new class {
=======
<<<<<<< .merge_file_zA4CJB
>>>>>>> .merge_file_E1lPtT
=======
>>>>>>> laraxot/dev
        app()->instance('translator', new class()
        {
            public function getLoader(): object
            {
                return new class()
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
                {
=======
=======
        app()->instance('translator', new class
        {
            public function getLoader(): object
            {
                return new class
>>>>>>> .merge_file_aWv0C1
                {
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
                {
>>>>>>> laraxot/dev
                    /** @return array<string, string> */
                    public function namespaces(): array
                    {
                        return [];
                    }
                };
            }
        });

        $data = TranslationData::from([
            'lang' => 'it',
            'namespace' => 'missing',
            'group' => 'g',
            'item' => 'i',
        ]);
        expect(fn () => $data->getFilename())->toThrow(\Exception::class);

        $file = sys_get_temp_dir().'/td_'.uniqid().'.php';
        file_put_contents($file, "<?php\nreturn 'nope';\n");
        $data2 = TranslationData::from([
            'lang' => 'it',
            'namespace' => 'x',
            'group' => 'g',
            'item' => 'i',
            'filename' => $file,
        ]);
        expect(fn () => $data2->getData())->toThrow(\Exception::class);
        unlink($file);
    });

    test('TranslatorAdapter covers array and non-string translation results', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $loader = new ArrayLoader();
=======
<<<<<<< .merge_file_b5pEBu
        $loader = new ArrayLoader();
=======
<<<<<<< .merge_file_zA4CJB
        $loader = new ArrayLoader();
=======
        $loader = new ArrayLoader;
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $loader = new ArrayLoader();
>>>>>>> laraxot/dev
        $loader->addMessages('it', 'm', [
            'tree' => ['k' => 'v'],
            'num' => 5,
            'ok' => 'yes',
        ]);
        $adapter = new TranslatorAdapter($loader, 'it');

        $this->mockService(RecordMissingTranslationAction::class, static function (MockInterface $mock): void {
            $mock->allows('execute');
        });

        Assert::assertSame(['k' => 'v'], $adapter->get('m.tree'));
        Assert::assertSame('m.num', $adapter->get('m.num'));
        Assert::assertSame('yes', $adapter->get('m.ok'));
    });

    test('LangServiceProvider registerTranslator and filament configure callbacks', function (): void {
        $this->mockService(SaveTransAction::class, static function (MockInterface $mock): void {
            $mock->allows('execute');
        });
        $this->mockService(RecordMissingTranslationAction::class, static function (MockInterface $mock): void {
            $mock->allows('execute');
        });
        $this->mockService(GetTransKeyAction::class, static function (MockInterface $mock): void {
            $mock->allows(['execute' => 'lang::txt']);
        });

        $provider = new LangServiceProvider(app());
        $provider->registerTranslator();
        Assert::assertInstanceOf(TranslatorAdapter::class, app('translator'));

        $provider->registerFilamentLabel();
        Assert::assertInstanceOf(Select::class, Select::make('s'));
        Assert::assertInstanceOf(TextInput::class, TextInput::make('t'));
        Assert::assertInstanceOf(TextEntry::class, TextEntry::make('e'));
        Assert::assertInstanceOf(Section::class, Section::make('sec'));
        Assert::assertInstanceOf(Filter::class, Filter::make('f'));
        Assert::assertInstanceOf(TextColumn::class, TextColumn::make('c'));
        Assert::assertInstanceOf(Action::class, Action::make('act'));
    });

    test('TranslatorTrait registerTranslator via probe', function (): void {
        $probe = new TranslatorTraitPhpstanProbe(app());
        $probe->registerTranslator();
        Assert::assertInstanceOf(TranslatorAdapter::class, app('translator'));
    });

    test('RouteServiceProvider registerLang with admin segment and locales', function (): void {
        config([
            'laravellocalization.supportedLocales' => [
                'it' => ['name' => 'it'],
                'en' => ['name' => 'en'],
            ],
        ]);
        $request = request();
        $request->server->set('REQUEST_URI', '/it/admin/dashboard');
        $request->server->set('PATH_INFO', '/it/admin/dashboard');

        $provider = new RouteServiceProvider(app());
        $provider->registerLang();
        Assert::assertContains(app()->getLocale(), ['it', 'en']);
    });

    test('ThemeComposer covers invalid config admin url and missing current lang', function (): void {
        config(['laravellocalization.supportedLocales' => 'bad']);
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        expect(fn () => (new ThemeComposer())->languages())->toThrow(\Exception::class);
=======
<<<<<<< .merge_file_b5pEBu
        expect(fn () => (new ThemeComposer())->languages())->toThrow(\Exception::class);
=======
<<<<<<< .merge_file_zA4CJB
        expect(fn () => (new ThemeComposer())->languages())->toThrow(\Exception::class);
=======
        expect(fn () => (new ThemeComposer)->languages())->toThrow(\Exception::class);
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        expect(fn () => (new ThemeComposer())->languages())->toThrow(\Exception::class);
>>>>>>> laraxot/dev

        config([
            'laravellocalization.supportedLocales' => [
                'it' => 'nope',
            ],
        ]);
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        expect(fn () => (new ThemeComposer())->languages())->toThrow(\InvalidArgumentException::class);
=======
<<<<<<< .merge_file_b5pEBu
        expect(fn () => (new ThemeComposer())->languages())->toThrow(\InvalidArgumentException::class);
=======
<<<<<<< .merge_file_zA4CJB
        expect(fn () => (new ThemeComposer())->languages())->toThrow(\InvalidArgumentException::class);
=======
        expect(fn () => (new ThemeComposer)->languages())->toThrow(\InvalidArgumentException::class);
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        expect(fn () => (new ThemeComposer())->languages())->toThrow(\InvalidArgumentException::class);
>>>>>>> laraxot/dev

        config([
            'laravellocalization.supportedLocales' => [
                'it' => ['name' => 'Italiano'],
            ],
        ]);
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        expect(fn () => (new ThemeComposer())->languages())->toThrow(\InvalidArgumentException::class);
=======
<<<<<<< .merge_file_b5pEBu
        expect(fn () => (new ThemeComposer())->languages())->toThrow(\InvalidArgumentException::class);
=======
<<<<<<< .merge_file_zA4CJB
        expect(fn () => (new ThemeComposer())->languages())->toThrow(\InvalidArgumentException::class);
=======
        expect(fn () => (new ThemeComposer)->languages())->toThrow(\InvalidArgumentException::class);
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        expect(fn () => (new ThemeComposer())->languages())->toThrow(\InvalidArgumentException::class);
>>>>>>> laraxot/dev

        config([
            'laravellocalization.supportedLocales' => [
                'it' => ['name' => 'Italiano', 'regional' => 'it_IT'],
                'en' => ['name' => 'English', 'regional' => 'en_US'],
            ],
        ]);
        app()->setLocale('it');
<<<<<<< HEAD
<<<<<<< .merge_file_tWY0jc
        $composer = new ThemeComposer();
=======
<<<<<<< .merge_file_b5pEBu
        $composer = new ThemeComposer();
=======
<<<<<<< .merge_file_zA4CJB
        $composer = new ThemeComposer();
=======
        $composer = new ThemeComposer;
>>>>>>> .merge_file_aWv0C1
>>>>>>> .merge_file_LTxXzl
>>>>>>> .merge_file_E1lPtT
=======
        $composer = new ThemeComposer();
>>>>>>> laraxot/dev
        Assert::assertCount(2, $composer->languages());

        $request = request();
        $request->server->set('REQUEST_URI', '/it/admin/x');
        $request->server->set('PATH_INFO', '/it/admin/x');
        session(['in_admin' => true]);
        $firstLanguage = $composer->languages()->toCollection()->first();
        Assert::assertNotNull($firstLanguage);
        Assert::assertIsString($firstLanguage->url);

        app()->setLocale('zz');
        expect(fn () => $composer->currentLang('name'))->toThrow(\Exception::class);
    });
});
