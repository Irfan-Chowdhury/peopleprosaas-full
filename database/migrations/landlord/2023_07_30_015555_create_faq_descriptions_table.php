<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('faq_descriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->text('heading');
            $table->text('sub_heading');
            $table->timestamps();

            $table->foreign('language_id', 'faq_descriptions_language_id_foreign')->references('id')->on('languages')->onDelete('set NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faq_descriptions', function (Blueprint $table) {
            $table->dropForeign('faq_descriptions_language_id_foreign');
            $table->dropIfExists('faq_descriptions');
        });
    }
};
