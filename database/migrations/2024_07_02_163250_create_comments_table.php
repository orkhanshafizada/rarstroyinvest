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
        if(!Schema::hasTable('comments'))
            Schema::create('comments', function(Blueprint $table)
            {
                $table->id();
                $table->string('image');
                $table->integer('sort')->default(1);
                $table->integer('active')->default(1);

                $table->timestamps();
                $table->softDeletes();
            });

        if(!Schema::hasTable('comment_translations'))
            Schema::create('comment_translations', function(Blueprint $table)
            {
                $table->id();
                $table->foreignId('comment_id')->constrained()->onDelete('cascade');
                $table->string('locale')->index();
                $table->string('full_name')->nullable();
                $table->longText('description')->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->unique(['comment_id', 'locale']);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_translations');
        Schema::dropIfExists('comments');
    }
};
