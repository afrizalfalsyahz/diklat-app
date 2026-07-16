<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyRequestItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'supply_request_id',
        'supply_id',
        'quantity',
        'notes',
    ];

    public function request()
    {
        return $this->belongsTo(SupplyRequest::class, 'supply_request_id');
    }

    public function supply()
    {
        return $this->belongsTo(Supply::class);
    }
}
