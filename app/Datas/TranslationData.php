<?php

declare(strict_types=1);

namespace Modules\Lang\Datas;

use Illuminate\Contracts\Translation\Translator as TranslatorContract;
use Illuminate\Support\Facades\File;
use Illuminate\Translation\Translator;
use Modules\Xot\Actions\File\FixPathAction;
use Spatie\LaravelData\Data;
use Webmozart\Assert\Assert;

class TranslationData extends Data
{
    // public string $id
    public string $lang;

    public string $namespace;

    public string $group;

    public string $item;

    public ?string $filename = null;

    // public string $key;
    public int|string|null $value = null;

    public function getFilename(): string
    {
        if ($this->filename !== null) {
            return $this->filename;
        }

        $translator = app('translator');
        Assert::isInstanceOf($translator, TranslatorContract::class);
        Assert::isInstanceOf($translator, Translator::class);

        /** @var array<string, string> $hints */
        $hints = $translator->getLoader()->namespaces();
        $path = collect($hints)->get($this->namespace);
        if ($path === null) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }

        // Verifichiamo che $path sia una stringa
        Assert::string($path, 'Il percorso del namespace deve essere una stringa');

        $this->filename = app(FixPathAction::class)
            ->execute($path.'/'.$this->lang.'/'.$this->group.'.php');

        return $this->filename;
    }

    /**
     * @return array<string, mixed>
     */
    public function getData(): array
    {
        $filename = $this->getFilename();
        $data = [];
        if (File::exists($filename)) {
            $data = File::getRequire($filename);
        }
        if (! is_array($data)) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }

        /** @var array<string, mixed> $result */
        $result = $data;

        return $result;
    }
}
