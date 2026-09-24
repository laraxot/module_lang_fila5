<?php

declare(strict_types=1);
<<<<<<< .merge_file_SvwR2Y
=======

>>>>>>> .merge_file_PhB2eB
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< .merge_file_SvwR2Y
return new class extends Migration
{
=======
return new class extends Migration {
>>>>>>> .merge_file_PhB2eB
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('language_lines', function (Blueprint $table): void {
            $table->id();
            $table->string('group')->index();
            $table->string('key');
            $table->json('text');
            $table->string('locale')->index();
            $table->timestamps();
            $table->unique(['group', 'key', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_lines');
    }
};
