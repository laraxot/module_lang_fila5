<?php

declare(strict_types=1);

use Modules\Lang\Database\Factories\PostFactory;
use Modules\Lang\Database\Factories\TranslationFactory;
use Modules\Lang\Database\Factories\TranslationFileFactory;
use Modules\Lang\Models\Post;
use Modules\Lang\Models\Translation;
use Modules\Lang\Models\TranslationFile;
use Modules\Lang\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Lang Business Logic', function () {
    it('can create and manage posts', function () {
        $user = UserFactory::new()->createOne();

        $post = PostFactory::new()->createOne([
            'user_id' => $user->id,
            'title' => 'Test Post',
            'content' => 'This is a test post content',
            'status' => 'draft',
        ]);

<<<<<<< HEAD
       Assert::assertInstanceOf(Post::class, $post);
=======
        Assert::assertInstanceOf(Post::class, $post);
>>>>>>> laraxot/dev
        Assert::assertSame($user->id, $post->user_id);
        Assert::assertSame('Test Post', $post->title);
        Assert::assertSame('draft', $post->status);

        langAssertDatabaseHasRow('posts', [
            'id' => $post->id,
            'user_id' => $user->id,
            'title' => 'Test Post',
            'status' => 'draft',
        ]);
    });

    it('can publish posts', function () {
<<<<<<< HEAD
       $user = UserFactory::new()->createOne();
=======
        $user = UserFactory::new()->createOne();
>>>>>>> laraxot/dev
        $post = PostFactory::new()->createOne([
            'user_id' => $user->id,
            'status' => 'draft',
        ]);

        $post->update(['status' => 'published']);

<<<<<<< HEAD
       $freshPost = $post->fresh();
=======
        $freshPost = $post->fresh();
>>>>>>> laraxot/dev
        Assert::assertNotNull($freshPost);
        Assert::assertSame('published', $freshPost->status);
        langAssertDatabaseHasRow('posts', [
            'id' => $post->id,
            'status' => 'published',
        ]);
    });

    it('can manage post categories', function () {
<<<<<<< HEAD
       $user = UserFactory::new()->createOne();
=======
        $user = UserFactory::new()->createOne();
>>>>>>> laraxot/dev

        $newsPost = PostFactory::new()->createOne([
            'user_id' => $user->id,
            'category' => 'news',
            'title' => 'News Post',
        ]);

<<<<<<< HEAD
       $tutorialPost = PostFactory::new()->createOne([
=======
        $tutorialPost = PostFactory::new()->createOne([
>>>>>>> laraxot/dev
            'user_id' => $user->id,
            'category' => 'tutorial',
            'title' => 'Tutorial Post',
        ]);

<<<<<<< HEAD
       Assert::assertSame('news', $newsPost->category);
=======
        Assert::assertSame('news', $newsPost->category);
>>>>>>> laraxot/dev
        Assert::assertSame('tutorial', $tutorialPost->category);
        langAssertDatabaseHasRow('posts', [
            'id' => $newsPost->id,
            'category' => 'news',
        ]);

<<<<<<< HEAD
       langAssertDatabaseHasRow('posts', [
=======
        langAssertDatabaseHasRow('posts', [
>>>>>>> laraxot/dev
            'id' => $tutorialPost->id,
            'category' => 'tutorial',
        ]);
    });

    it('can create and manage translations', function () {
<<<<<<< HEAD
       $user = UserFactory::new()->createOne();
=======
        $user = UserFactory::new()->createOne();
>>>>>>> laraxot/dev

        $translation = TranslationFactory::new()->createOne([
            'user_id' => $user->id,
            'key' => 'welcome.message',
            'value' => 'Welcome to our application',
            'locale' => 'en',
        ]);

<<<<<<< HEAD
       Assert::assertInstanceOf(Translation::class, $translation);
=======
        Assert::assertInstanceOf(Translation::class, $translation);
>>>>>>> laraxot/dev
        Assert::assertSame($user->id, $translation->user_id);
        Assert::assertSame('welcome.message', $translation->key);
        Assert::assertSame('Welcome to our application', $translation->value);
        Assert::assertSame('en', $translation->locale);

        langAssertDatabaseHasRow('translations', [
            'id' => $translation->id,
            'user_id' => $user->id,
            'key' => 'welcome.message',
            'value' => 'Welcome to our application',
            'locale' => 'en',
        ]);
    });

    it('can manage multilingual content', function () {
<<<<<<< HEAD
       $user = UserFactory::new()->createOne();
=======
        $user = UserFactory::new()->createOne();
>>>>>>> laraxot/dev

        $englishTranslation = TranslationFactory::new()->createOne([
            'user_id' => $user->id,
            'key' => 'welcome.message',
            'value' => 'Welcome to our application',
            'locale' => 'en',
        ]);

<<<<<<< HEAD
       $italianTranslation = TranslationFactory::new()->createOne([
=======
        $italianTranslation = TranslationFactory::new()->createOne([
>>>>>>> laraxot/dev
            'user_id' => $user->id,
            'key' => 'welcome.message',
            'value' => 'Benvenuto nella nostra applicazione',
            'locale' => 'it',
        ]);

<<<<<<< HEAD
       $germanTranslation = TranslationFactory::new()->createOne([
=======
        $germanTranslation = TranslationFactory::new()->createOne([
>>>>>>> laraxot/dev
            'user_id' => $user->id,
            'key' => 'welcome.message',
            'value' => 'Willkommen in unserer Anwendung',
            'locale' => 'de',
        ]);

<<<<<<< HEAD
       Assert::assertSame('Welcome to our application', $englishTranslation->value);
=======
        Assert::assertSame('Welcome to our application', $englishTranslation->value);
>>>>>>> laraxot/dev
        Assert::assertSame('Benvenuto nella nostra applicazione', $italianTranslation->value);
        Assert::assertSame('Willkommen in unserer Anwendung', $germanTranslation->value);

        langAssertDatabaseHasRow('translations', [
            'key' => 'welcome.message',
            'locale' => 'en',
        ]);

<<<<<<< HEAD
       langAssertDatabaseHasRow('translations', [
=======
        langAssertDatabaseHasRow('translations', [
>>>>>>> laraxot/dev
            'key' => 'welcome.message',
            'locale' => 'it',
        ]);

<<<<<<< HEAD
       langAssertDatabaseHasRow('translations', [
=======
        langAssertDatabaseHasRow('translations', [
>>>>>>> laraxot/dev
            'key' => 'welcome.message',
            'locale' => 'de',
        ]);
    });

    it('can manage translation files', function () {
<<<<<<< HEAD
       $translationFile = TranslationFileFactory::new()->createOne([
=======
        $translationFile = TranslationFileFactory::new()->createOne([
>>>>>>> laraxot/dev
            'name' => 'welcome.php',
            'path' => module_path('Lang', 'lang/en/welcome.php'),
        ]);

        Assert::assertInstanceOf(TranslationFile::class, $translationFile);
        Assert::assertSame('welcome.php', $translationFile->name);
        Assert::assertSame(module_path('Lang', 'lang/en/welcome.php'), $translationFile->path);
    });

    it('can validate translation keys', function () {
        $user = UserFactory::new()->createOne();

        $validTranslation = TranslationFactory::new()->createOne([
            'user_id' => $user->id,
            'key' => 'user.profile.name',
            'value' => 'User Name',
            'locale' => 'en',
        ]);

<<<<<<< HEAD
       Assert::assertNotNull($validTranslation->key);
=======
        Assert::assertNotNull($validTranslation->key);
>>>>>>> laraxot/dev
        Assert::assertStringContainsString('.', $validTranslation->key);
        Assert::assertStringStartsWith('user', $validTranslation->key);

        $invalidTranslation = TranslationFactory::new()->createOne([
            'user_id' => $user->id,
            'key' => 'invalid_key_format',
            'value' => 'Invalid Key',
            'locale' => 'en',
        ]);

<<<<<<< HEAD
       Assert::assertNotNull($invalidTranslation->key);
=======
        Assert::assertNotNull($invalidTranslation->key);
>>>>>>> laraxot/dev
        Assert::assertStringNotContainsString('.', $invalidTranslation->key);
    });

    it('can manage post workflow', function () {
        $user = UserFactory::new()->createOne();
        $post = PostFactory::new()->createOne([
            'user_id' => $user->id,
            'status' => 'draft',
        ]);

<<<<<<< HEAD
       $post->update(['status' => 'review']);
=======
        $post->update(['status' => 'review']);
>>>>>>> laraxot/dev
        $reviewPost = $post->fresh();
        Assert::assertNotNull($reviewPost);
        Assert::assertSame('review', $reviewPost->status);

        $post->update(['status' => 'published']);
        $publishedPost = $post->fresh();
        Assert::assertNotNull($publishedPost);
        Assert::assertSame('published', $publishedPost->status);

        $post->update(['status' => 'archived']);
        $archivedPost = $post->fresh();
        Assert::assertNotNull($archivedPost);
        Assert::assertSame('archived', $archivedPost->status);
    });

    it('can track translation changes', function () {
        $user = UserFactory::new()->createOne();
        $translation = TranslationFactory::new()->createOne([
            'user_id' => $user->id,
            'key' => 'welcome.message',
            'value' => 'Original message',
            'locale' => 'en',
        ]);

        $translation->update(['value' => 'Updated message']);

<<<<<<< HEAD
       $freshTranslation = $translation->fresh();
=======
        $freshTranslation = $translation->fresh();
>>>>>>> laraxot/dev
        Assert::assertNotNull($freshTranslation);
        Assert::assertSame('Updated message', $freshTranslation->value);
        langAssertDatabaseHasRow('translations', [
            'id' => $translation->id,
            'value' => 'Updated message',
        ]);
    });

    it('can manage post metadata', function () {
<<<<<<< HEAD
       $user = UserFactory::new()->createOne();
=======
        $user = UserFactory::new()->createOne();
>>>>>>> laraxot/dev

        $post = PostFactory::new()->createOne([
            'user_id' => $user->id,
            'title' => 'SEO Optimized Post',
            'meta_title' => 'SEO Meta Title',
            'meta_description' => 'SEO Meta Description',
            'meta_keywords' => 'seo, optimization, meta',
        ]);

<<<<<<< HEAD
       Assert::assertSame('SEO Meta Title', $post->meta_title);
=======
        Assert::assertSame('SEO Meta Title', $post->meta_title);
>>>>>>> laraxot/dev
        Assert::assertSame('SEO Meta Description', $post->meta_description);
        Assert::assertSame('seo, optimization, meta', $post->meta_keywords);

        langAssertDatabaseHasRow('posts', [
            'id' => $post->id,
            'meta_title' => 'SEO Meta Title',
            'meta_description' => 'SEO Meta Description',
            'meta_keywords' => 'seo, optimization, meta',
        ]);
    });

    it('can manage translation namespaces', function () {
<<<<<<< HEAD
       $user = UserFactory::new()->createOne();
=======
        $user = UserFactory::new()->createOne();
>>>>>>> laraxot/dev

        $adminTranslation = TranslationFactory::new()->createOne([
            'user_id' => $user->id,
            'key' => 'admin.dashboard.title',
            'value' => 'Admin Dashboard',
            'locale' => 'en',
            'namespace' => 'admin',
        ]);

<<<<<<< HEAD
       $frontendTranslation = TranslationFactory::new()->createOne([
=======
        $frontendTranslation = TranslationFactory::new()->createOne([
>>>>>>> laraxot/dev
            'user_id' => $user->id,
            'key' => 'frontend.home.title',
            'value' => 'Home Page',
            'locale' => 'en',
            'namespace' => 'frontend',
        ]);

<<<<<<< HEAD
       Assert::assertSame('admin', $adminTranslation->namespace);
=======
        Assert::assertSame('admin', $adminTranslation->namespace);
>>>>>>> laraxot/dev
        Assert::assertSame('frontend', $frontendTranslation->namespace);
        langAssertDatabaseHasRow('translations', [
            'id' => $adminTranslation->id,
            'namespace' => 'admin',
        ]);

<<<<<<< HEAD
       langAssertDatabaseHasRow('translations', [
=======
        langAssertDatabaseHasRow('translations', [
>>>>>>> laraxot/dev
            'id' => $frontendTranslation->id,
            'namespace' => 'frontend',
        ]);
    });

    it('can validate locale formats', function () {
<<<<<<< HEAD
       $user = UserFactory::new()->createOne();
=======
        $user = UserFactory::new()->createOne();
>>>>>>> laraxot/dev

        $validLocales = ['en', 'it', 'de', 'fr', 'es'];

        foreach ($validLocales as $locale) {
<<<<<<< HEAD
           $translation = TranslationFactory::new()->createOne([
=======
            $translation = TranslationFactory::new()->createOne([
>>>>>>> laraxot/dev
                'user_id' => $user->id,
                'key' => "test.{$locale}",
                'value' => "Test in {$locale}",
                'locale' => $locale,
            ]);

<<<<<<< HEAD
           Assert::assertSame($locale, $translation->locale);
=======
            Assert::assertSame($locale, $translation->locale);
>>>>>>> laraxot/dev
            langAssertDatabaseHasRow('translations', [
                'id' => $translation->id,
                'locale' => $locale,
            ]);
        }
    });

    it('can manage post scheduling', function () {
<<<<<<< HEAD
       $user = UserFactory::new()->createOne();
=======
        $user = UserFactory::new()->createOne();
>>>>>>> laraxot/dev
        $futureDate = now()->addDays(7);

        $scheduledPost = PostFactory::new()->createOne([
            'user_id' => $user->id,
            'title' => 'Scheduled Post',
            'status' => 'scheduled',
            'published_at' => $futureDate,
        ]);

<<<<<<< HEAD
       Assert::assertSame('scheduled', $scheduledPost->status);
=======
        Assert::assertSame('scheduled', $scheduledPost->status);
>>>>>>> laraxot/dev
        Assert::assertNotNull($scheduledPost->published_at);
        Assert::assertSame(
            $futureDate->format('Y-m-d H:i:s'),
            $scheduledPost->published_at->format('Y-m-d H:i:s'),
        );
        langAssertDatabaseHasRow('posts', [
            'id' => $scheduledPost->id,
            'status' => 'scheduled',
        ]);
    });

    it('can track translation statistics', function () {
<<<<<<< HEAD
       $user = UserFactory::new()->createOne();
=======
        $user = UserFactory::new()->createOne();
>>>>>>> laraxot/dev

        TranslationFactory::new()->count(5)->create([
            'user_id' => $user->id,
            'locale' => 'en',
        ]);

        TranslationFactory::new()->count(3)->create([
            'user_id' => $user->id,
            'locale' => 'it',
        ]);

        TranslationFactory::new()->count(2)->create([
            'user_id' => $user->id,
            'locale' => 'de',
        ]);

        $totalTranslations = Translation::where('user_id', $user->id)->count();
        $englishCount = Translation::where('user_id', $user->id)->where('locale', 'en')->count();
        $italianCount = Translation::where('user_id', $user->id)->where('locale', 'it')->count();
        $germanCount = Translation::where('user_id', $user->id)->where('locale', 'de')->count();

<<<<<<< HEAD
       Assert::assertSame(10, $totalTranslations);
=======
        Assert::assertSame(10, $totalTranslations);
>>>>>>> laraxot/dev
        Assert::assertSame(5, $englishCount);
        Assert::assertSame(3, $italianCount);
        Assert::assertSame(2, $germanCount);
    });
});
