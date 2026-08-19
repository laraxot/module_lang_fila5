<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Unit;

use Mockery;
use Mockery\MockInterface;
use Modules\Lang\Actions\MergeTranslationsAction;
use Modules\Lang\Actions\WriteTranslationFileAction;
use Modules\Lang\Filament\Resources\TranslationFileResource;
use Modules\Lang\Models\Policies\PostPolicy;
use Modules\Lang\Models\Policies\TranslationFilePolicy;
use Modules\Lang\Models\Policies\TranslationPolicy;
use Modules\Lang\Models\Post;
use Modules\Lang\Models\Translation;
use Modules\Lang\Models\TranslationFile;
use Modules\Lang\Tests\TestCase;
use Modules\Xot\Contracts\UserContract;
use PHPUnit\Framework\Assert;

use function Safe\unlink;

uses(TestCase::class);

/**
 * @param  list<string>  $permissions
 * @return Mockery\MockInterface&UserContract
 */
function langFakeUser(array $permissions = [], bool $superAdmin = false): UserContract
{
    /** @var Mockery\MockInterface&UserContract $user */
    $user = Mockery::mock(UserContract::class);
    $user->shouldReceive('hasRole')
        ->with('super-admin')
        ->andReturn($superAdmin);
    $user->shouldReceive('hasPermissionTo')
        ->andReturnUsing(static function (string $permission) use ($permissions): bool {
            return in_array($permission, $permissions, true);
        });

    return $user;
}

afterEach(function (): void {
    Mockery::close();
});

describe('Lang coverage boost — Actions', function (): void {
    test('MergeTranslationsAction merges later files over earlier keys', function (): void {
        $merged = app(MergeTranslationsAction::class)->execute([
            ['welcome' => 'Hello', 'bye' => 'Goodbye'],
            ['welcome' => 'Ciao'],
        ]);

        Assert::assertSame('Ciao', $merged['welcome']);
        Assert::assertSame('Goodbye', $merged['bye']);
    });

    test('WriteTranslationFileAction writes valid php translation file', function (): void {
        $path = sys_get_temp_dir().'/lang_write_test_'.uniqid().'.php';

        try {
            app()->instance('cache', new class()
            {
                public function flush(): void {}
            });

            $result = app(WriteTranslationFileAction::class)->execute($path, [
                'greeting' => 'Hello',
                'nested' => ['key' => 'value'],
            ]);

            Assert::assertTrue($result);
            Assert::assertFileExists($path);
            /** @var array<string, mixed> $loaded */
            $loaded = require $path;
            Assert::assertSame('Hello', $loaded['greeting']);
        } finally {
            if (file_exists($path)) {
                unlink($path);
            }
        }
    });
});

describe('Lang coverage boost — Policies', function (): void {
    test('TranslationPolicy delegates to permissions', function (): void {
        $policy = new TranslationPolicy();
        $allowed = langFakeUser(['translation.viewAny', 'translation.view', 'translation.create']);
        $denied = langFakeUser([]);

        Assert::assertTrue($policy->viewAny($allowed));
        Assert::assertTrue($policy->view($allowed, new Translation()));
        Assert::assertTrue($policy->create($allowed));
        Assert::assertFalse($policy->viewAny($denied));
    });

    test('super-admin bypasses TranslationPolicy checks', function (): void {
        $policy = new TranslationPolicy();
        $superAdmin = langFakeUser(superAdmin: true);

        Assert::assertTrue($policy->before($superAdmin, 'viewAny'));
    });

    test('PostPolicy and TranslationFilePolicy enforce permissions', function (): void {
        $postPolicy = new PostPolicy();
        $filePolicy = new TranslationFilePolicy();
        $user = langFakeUser(['post.update', 'translation_file.delete']);

        Assert::assertTrue($postPolicy->update($user, new Post()));
        Assert::assertTrue($filePolicy->delete($user, new TranslationFile()));
        Assert::assertFalse($postPolicy->delete(langFakeUser([]), new Post()));
    });
});

describe('Lang coverage boost — Filament static', function (): void {
    test('TranslationFileResource exposes translatable helpers and pages', function (): void {
        config(['app.locale' => 'it']);

        Assert::assertSame('it', TranslationFileResource::getDefaultTranslatableLocale());
        Assert::assertSame(['it', 'en'], TranslationFileResource::getTranslatableLocales());
        Assert::assertSame([], TranslationFileResource::getFormSchemaOld());

        $pages = TranslationFileResource::getPages();
        Assert::assertArrayHasKey('index', $pages);
        Assert::assertArrayHasKey('create', $pages);
        Assert::assertArrayHasKey('edit', $pages);
    });
});

describe('Lang coverage boost — Post accessors', function (): void {
    test('Post mutators and accessors work without persisting', function (): void {
        $post = new Post();
        $post->setTitleAttribute('My Title');

        Assert::assertSame('My Title', $post->getAttributes()['title']);
        Assert::assertSame('my-title', $post->getAttributes()['guid']);
        Assert::assertSame('', $post->getTxtAttribute(null));

        $post->title = 'Search me';
        $post->guid = 'search-me';
        $post->txt = 'body';

        Assert::assertSame(
            ['title' => 'Search me', 'guid' => 'search-me', 'txt' => 'body'],
            $post->toSearchableArray(),
        );
    });

    test('Post guid accessor slugifies fallback title', function (): void {
        $post = new Post();
        $post->setRawAttributes(['title' => 'Hello World']);

        Assert::assertSame('hello-world', $post->getGuidAttribute(null));
    });
});
