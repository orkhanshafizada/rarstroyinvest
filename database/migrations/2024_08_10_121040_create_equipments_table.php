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
        if(!Schema::hasTable('equipment'))
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('house_id')->constrained()->onDelete('cascade');
            $table->foreignId('structure_id')->constrained()->onDelete('cascade');
            $table->integer('sort')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        if(!Schema::hasTable('equipment_translations'))
            Schema::create('equipment_translations', function(Blueprint $table)
            {
                $table->id();
                $table->foreignId('equipment_id')->constrained()->onDelete('cascade');
                $table->string('locale')->index();
                $table->string('title')->nullable();
                $table->longText('content')->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->unique(['equipment_id', 'locale']);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_translations');
        Schema::dropIfExists('equipments');
    }
};
