<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('sliders'))
            Schema::create('sliders', function (Blueprint $table) {
                $table->id();
                $table->tinyInteger('type')->default(1)->comment('1 - Content; 2 - Link;');
                $table->string('image')->nullable();
                $table->integer('sort')->default(1);
                $table->tinyInteger('active')->default(1);
                $table->timestamps();
            });

        if (!Schema::hasTable('slider_translations'))
            Schema::create('slider_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('slider_id')->constrained()->onDelete('cascade');
                $table->string('locale')->index();
                $table->string('slug')->nullable();
                $table->string('title')->nullable();
                $table->string('link')->nullable();
                $table->longText('content')->nullable();
                $table->timestamps();

                $table->unique(['slider_id', 'locale']);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider_translations');
        Schema::dropIfExists('sliders');
    }
}
