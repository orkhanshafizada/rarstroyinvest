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
        if(!Schema::hasTable('structures'))
        Schema::create('structures', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
        });

        if(!Schema::hasTable('structure_translations'))
            Schema::create('structure_translations', function(Blueprint $table)
            {
                $table->id();
                $table->foreignId('structure_id')->constrained()->onDelete('cascade');
                $table->string('locale')->index();
                $table->string('name')->nullable();
                $table->timestamps();

                $table->unique(['structure_id', 'locale']);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structure_translations');
        Schema::dropIfExists('structures');
    }
};
