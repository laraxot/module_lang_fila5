use Illuminate\Contracts\Translation\Loader;
use Illuminate\Translation\Translator;
    /** @var Loader $loader */
        Assert::assertInstanceOf(Translator::class, makeTranslatorAdapter());