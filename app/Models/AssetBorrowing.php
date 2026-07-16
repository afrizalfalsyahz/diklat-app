<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetBorrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_code',
        'user_id',
        'approved_by',
        'borrow_date',
        'due_date',
        'returned_date',
        'status',
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

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function items()
    {
        return $this->hasMany(AssetBorrowingItem::class);
    }
}
