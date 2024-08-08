<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('abouts'))
            Schema::create('abouts', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });


        if (!Schema::hasTable('about_translations'))
            Schema::create('about_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('about_id')->constrained()->onDelete('cascade');
                $table->string('locale')->index();
                $table->string('title')->nullable();
                $table->string('slug')->nullable();
                $table->longText('short_description')->nullable();
                $table->longText('long_description')->nullable();
                $table->timestamps();

                $table->unique(['about_id', 'locale']);
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_translations');
        Schema::dropIfExists('abouts');
    }
}
