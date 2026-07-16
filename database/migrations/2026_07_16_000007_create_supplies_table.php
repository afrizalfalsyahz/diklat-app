<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supply_category_id')->constrained('supply_categories')->cascadeOnDelete();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('unit_of_measure');
            $table->integer('current_stock')->default(0);
            $table->integer('minimum_stock')->default(0);
            $table->decimal('unit_price', 12, 2)->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supplies');
    }
};
