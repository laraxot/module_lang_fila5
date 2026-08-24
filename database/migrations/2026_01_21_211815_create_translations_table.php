<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Lang\Models\Translation;
use Modules\Xot\Database\Migrations\XotBaseMigration;

<<<<<<< .merge_file_cryLN3
return new class extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> .merge_file_wxggSi
    protected ?string $model_class = Translation::class;

    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(function (Blueprint $table): void {
            $table->id();
            $table->string('lang')->nullable()->index();
            $table->text('value')->nullable();
            $table->string('namespace')->nullable()->index();
            $table->string('group')->nullable()->index();
            $table->string('item')->nullable();
            $table->string('key')->nullable()->index();
            $table->string('locale')->nullable()->index();
            $table->unsignedBigInteger('user_id')->nullable()->index();
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateTimestamps($table, false);
        });
    }
};
