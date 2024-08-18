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
        if(!Schema::hasTable('houses'))
        {
            Schema::create('houses', function(Blueprint $table)
            {
                $table->id();

                $table->string('main_image');
                $table->string('location')->nullable();
                $table->integer('active')->default(1);
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if(!Schema::hasTable('house_translations'))
        {
            Schema::create('house_translations', function(Blueprint $table)
            {
                $table->id();
                $table->foreignId('house_id')->constrained()->onDelete('cascade');
                $table->string('locale')->index();
                $table->string('name')->nullable();
                $table->string('video_url')->nullable();
                $table->string('slug')->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->unique(['house_id', 'locale']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house_translations');
        Schema::dropIfExists('houses');
    }
};
