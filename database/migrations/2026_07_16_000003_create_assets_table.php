<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_category_id')->constrained('asset_categories')->cascadeOnDelete();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('brand')->nullable();
            $table->string('type')->nullable();
            $table->year('year_acquired')->nullable();
            $table->enum('condition', [
                'good',
                'minor_damage',
                'major_damage',
            ])->default('good');
            $table->integer('quantity')->default(1);
            $table->integer('available_quantity')->default(1);
            $table->string('location')->nullable();
            $table->enum('status', [
                'available',
                'borrowed',
            ])->default('available');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
