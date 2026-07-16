<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('archive_classification_id')->constrained('archive_classifications')->cascadeOnDelete();
            $table->string('code')->unique();
            $table->string('title');
            $table->string('document_number')->nullable();
            $table->year('year')->nullable();
            $table->string('storage_location')->nullable();
            $table->enum('status', [
                'available',
                'borrowed',
                'restricted',
            ])->default('available');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};
