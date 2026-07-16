<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetBorrowingItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_borrowing_id',
        'asset_id',
        'quantity',
        'condition_before',
        'condition_after',
        'notes',
    ];

    public function borrowing()
    {
        return $this->belongsTo(AssetBorrowing::class, 'asset_borrowing_id');
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
