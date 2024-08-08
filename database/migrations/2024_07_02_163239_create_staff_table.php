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
        if(!Schema::hasTable('staff'))
            Schema::create('staff', function(Blueprint $table)
            {
                $table->id();
                $table->string('image');
                $table->integer('sort')->default(1);
                $table->integer('active')->default(1);

                $table->timestamps();
            });

        if(!Schema::hasTable('staff_translations'))
            Schema::create('staff_translations', function(Blueprint $table)
            {
                $table->id();
                $table->foreignId('staff_id')->constrained()->onDelete('cascade');
                $table->string('locale')->index();
                $table->string('full_name')->nullable();
                $table->string('position')->nullable();
                $table->longText('description')->nullable();
                $table->timestamps();

                $table->unique(['staff_id', 'locale']);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_translations');
        Schema::dropIfExists('staff');
    }
};
