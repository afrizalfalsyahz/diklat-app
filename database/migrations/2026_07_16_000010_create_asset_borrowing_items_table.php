<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asset_borrowing_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_borrowing_id')->constrained('asset_borrowings')->cascadeOnDelete();
            $table->foreignId('asset_id')->constrained('assets')->cascadeOnDelete();
            $table->integer('quantity')->default(1);
            $table->enum('condition_before', [
                'good',
                'minor_damage',
                'major_damage',
            ])->default('good');
            $table->enum('condition_after', [
                'good',
                'minor_damage',
                'major_damage',
            ])->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asset_borrowing_items');
    }
};
