<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Lang\Models\LanguageLine;
use Modules\Xot\Database\Migrations\XotBaseMigration;

<<<<<<< .merge_file_Uv0N6j
return new class extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> .merge_file_GJlICI
    protected ?string $model_class = LanguageLine::class;

    public function up(): void
    {
        $this->tableCreate(function (Blueprint $table): void {
            $table->id();
            $table->string('group')->index();
            $table->string('key');
            $table->json('text');
            $table->string('locale')->index();
            $table->unique(['group', 'key', 'locale']);
        });

        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateTimestamps($table, false);
        });
    }
};
