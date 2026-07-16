<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_category_id',
        'code',
        'name',
        'brand',
        'type',
        'year_acquired',
        'condition',
        'quantity',
        'available_quantity',
        'location',
        'status',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(AssetCategory::class, 'asset_category_id');
    }

    public function borrowingItems()
    {
        return $this->hasMany(AssetBorrowingItem::class);
    }
}
