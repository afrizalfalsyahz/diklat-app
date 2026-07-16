<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiveBorrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_code',
        'user_id',
        'archive_id',
        'approved_by',
        'borrow_date',
        'due_date',
        'returned_date',
        'status',
        'condition_before',
        'condition_after',
        'purpose',
        'rejection_reason',
        'return_notes',
    ];

    protected $casts = [
        'borrow_date' => 'date',
        'due_date' => 'date',
        'returned_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function archive()
    {
        return $this->belongsTo(Archive::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
