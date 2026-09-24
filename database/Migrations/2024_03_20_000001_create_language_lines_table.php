<?php

declare(strict_types=1);
<<<<<<< .merge_file_L7sg6I
=======
<<<<<<< .merge_file_okAop2

=======
<<<<<<< .merge_file_gzdshP

=======
<<<<<<< .merge_file_bZ6iSV

=======
>>>>>>> .merge_file_bkWCTA
>>>>>>> .merge_file_w6trKL
>>>>>>> .merge_file_NQzemX
>>>>>>> .merge_file_MQC7Az
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< .merge_file_L7sg6I
return new class extends Migration
{
=======
<<<<<<< .merge_file_okAop2
return new class extends Migration {
=======
<<<<<<< .merge_file_gzdshP
return new class extends Migration {
=======
<<<<<<< .merge_file_bZ6iSV
return new class extends Migration {
=======
return new class extends Migration
{
>>>>>>> .merge_file_bkWCTA
>>>>>>> .merge_file_w6trKL
>>>>>>> .merge_file_NQzemX
>>>>>>> .merge_file_MQC7Az
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
