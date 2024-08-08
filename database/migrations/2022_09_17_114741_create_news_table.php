<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('news'))
        {
            Schema::create('news', function(Blueprint $table)
            {
                $table->id();
                $table->string('main_image');
                $table->integer('show')->default(1);
                $table->integer('sort')->default(1);

                $table->timestamps();
            });
        }

        if(!Schema::hasTable('news_translations'))
        {
            Schema::create('news_translations', function(Blueprint $table)
            {
                $table->id();
                $table->foreignId('news_id')->constrained()->onDelete('cascade');
                $table->string('locale')->index();
                $table->string('title')->nullable();
                $table->string('slug')->nullable();
                $table->longText('short_content')->nullable();
                $table->longText('long_content')->nullable();
                $table->timestamps();

                $table->unique(['news_id', 'locale']);
            });
        }
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_translations');
        Schema::dropIfExists('news');
    }
}
