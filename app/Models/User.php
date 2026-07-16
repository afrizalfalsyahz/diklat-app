<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'nip',
        'email',
        'unit',
        'password',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public function assetBorrowings()
    {
        return $this->hasMany(AssetBorrowing::class, 'user_id');
    }

    public function approvedAssetBorrowings()
    {
        return $this->hasMany(AssetBorrowing::class, 'approved_by');
    }

    public function archiveBorrowings()
    {
        return $this->hasMany(ArchiveBorrowing::class, 'user_id');
    }

    public function approvedArchiveBorrowings()
    {
        return $this->hasMany(ArchiveBorrowing::class, 'approved_by');
    }

    public function supplyRequests()
    {
        return $this->hasMany(SupplyRequest::class, 'user_id');
    }

    public function approvedSupplyRequests()
    {
        return $this->hasMany(SupplyRequest::class, 'approved_by');
    }

    public function supplyStockHistories()
    {
        return $this->hasMany(SupplyStockHistory::class, 'user_id');
    }
}
