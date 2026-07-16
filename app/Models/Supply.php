<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    protected $fillable = [
        'supply_category_id',
        'code',
        'name',
        'unit_of_measure',
        'current_stock',
        'minimum_stock',
        'unit_price',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(SupplyCategory::class, 'supply_category_id');
    }

    public function requestItems()
    {
        return $this->hasMany(SupplyRequestItem::class);
    }

    public function stockHistories()
    {
        return $this->hasMany(SupplyStockHistory::class);
    }
}
