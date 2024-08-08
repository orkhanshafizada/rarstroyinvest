<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('faqs'))
            Schema::create('faqs', function (Blueprint $table) {
                $table->id();
                $table->integer('sort')->default(1);
                $table->timestamps();
            });

        if (!Schema::hasTable('faq_translations'))
            Schema::create('faq_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('faq_id')->constrained()->onDelete('cascade');
                $table->string('locale')->index();
                $table->string('title')->nullable();
                $table->longText('content')->nullable();
                $table->timestamps();

                $table->unique(['faq_id', 'locale']);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faq_translations');
        Schema::dropIfExists('faqs');
    }
}
