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
        if(!Schema::hasTable('filters'))
            Schema::create('filters', function(Blueprint $table)
            {
                $table->id();
                $table->integer('sort')->default(1);
                $table->integer('active')->default(1);
                $table->timestamps();
            });

        if(!Schema::hasTable('filter_translations'))
            Schema::create('filter_translations', function(Blueprint $table)
            {
                $table->id();
                $table->foreignId('filter_id')->constrained()->onDelete('cascade');
                $table->string('locale')->index();
                $table->string('name')->nullable();
                $table->timestamps();

                $table->unique(['filter_id', 'locale']);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filter_translations');
        Schema::dropIfExists('filters');
    }
};
