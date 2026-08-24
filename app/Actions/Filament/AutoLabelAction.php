<?php

declare(strict_types=1);

namespace Modules\Lang\Actions\Filament;

use Filament\Actions\Action;
use Filament\Forms\Components\Field;
use Filament\Infolists\Components\Entry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Tables\Columns\Column;
use Filament\Tables\Filters\BaseFilter;
use Illuminate\Support\Arr;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Modules\Lang\Actions\SaveTransAction;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Actions\File\SvgExistsAction;
use Modules\Xot\Actions\GetTransKeyAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class AutoLabelAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     * return number of input added.
     */
    public function execute(Field|Entry|BaseFilter|Column|Step|Action|Section $component, string $type = 'label'): Field|Entry|BaseFilter|Column|Step|Action|Section
    {
        $class = $this->findCallerFrame($component);

        if (is_array($class)) {
            $object_class = $this->objectClassFromFrame($class);
            if (is_null($object_class)) {
                return $component;
            }
            $trans_key = app(GetTransKeyAction::class)->execute($object_class);
        } else {
            $trans_key = 'lang::txt';
        }

        $label_tkey = null;
        $val = 'no-set-val';

        if ($component instanceof Step) {
            Assert::string($val = $component->getLabel());
            $label_tkey = $trans_key.'.steps.'.$val.'';
        }
        if (null === $label_tkey && $component instanceof Section) {
            $val = $component->getHeading();
            if (null === $val) {
                $val = 'empty';
            }
            if (! is_string($val)) {
                $val = app(SafeStringCastAction::class)->execute($val);
            }
            $label_tkey = $trans_key.'.sections.'.$val.'';
        }
        if (null === $label_tkey && method_exists($component, 'getName')) {
            Assert::string($val = $component->getName());
            $label_tkey = $trans_key.'.fields.'.$val.'';
        }

        if ($component instanceof Action) {
            Assert::string($val = $component->getName());
            $label_tkey = $trans_key.'.actions.'.$val.'';
        }

        $label_key = $label_tkey.'.'.Str::snake($type);

        $label = trans($label_key);
        if (is_string($label) && $label_key === $label) { // se non esiste la traduzione, la salvo
            app(SaveTransAction::class)->execute($label_key, $val);
        }
        if (! is_string($label)) {
            $component->label('FIX:'.$label_key);

            return $component;
        }
        if ($label_key === $label || ! method_exists($component, $type)) {
            return $component;
        }
        if ('icon' === $type) {
            $exists = app(SvgExistsAction::class)->execute($label);
            if ($exists && method_exists($component, 'iconButton')) {
                $component->iconButton();
            }
            if ($exists) {
                $component->{$type}($label);
            }

            return $component;
        }

        if (strip_tags($label) !== $label && 'helperText' === $type) {
            $component->{$type}(new HtmlString($label));

            return $component;
        }

        $component->{$type}($label);

        return $component;
    }

    /**
     * @return array<string, mixed>|null
     */
    protected function findCallerFrame(Field|Entry|BaseFilter|Column|Step|Action|Section $component): ?array
    {
        $backtrace = debug_backtrace();
        $backtrace_slice = array_slice($backtrace, 2);
        $class = Arr::first($backtrace_slice, function (array $item) use ($component) {
            if ('execute' === $item['function']) {
                return false;
            }

            if (
                isset($item['object'])
                    && is_object($item['object'])
                    && Str::startsWith($item['object']::class, 'Modules\\')
                    && $item['object'] !== $component
            ) {
                return true;
            }

            if (isset($item['class']) && Str::startsWith($item['class'], 'Modules\\')) {
                $reflection_class = new \ReflectionClass($item['class']);
                if (! $reflection_class->isAbstract()) {
                    return true;
                }
            }

            return false;
        });

        return is_array($class) ? $class : null;
    }

    /**
     * @param array<string, mixed> $class
     */
    protected function objectClassFromFrame(array $class): ?string
    {
        $object_class = null;
        if (isset($class['object']) && is_object($class['object'])) {
            $object_class = $class['object']::class;
        }
        if (isset($class['class']) && null === $object_class) {
            $object_class = $class['class'];
        }

        return is_string($object_class) ? $object_class : null;
    }
}
