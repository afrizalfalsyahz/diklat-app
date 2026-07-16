<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asset_borrowings', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code')->unique();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->date('borrow_date');
            $table->date('due_date');
            $table->date('returned_date')->nullable();
            $table->enum('status', [
                'submitted',
                'approved',
                'rejected',
                'borrowed',
                'returned',
                'overdue',
            ])->default('submitted');
            $table->text('purpose');
            $table->text('rejection_reason')->nullable();
            $table->text('return_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asset_borrowings');
    }
};
