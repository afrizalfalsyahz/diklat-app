<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'archive_classification_id',
        'code',
        'title',
        'document_number',
        'year',
        'storage_location',
        'status',
        'description',
    ];

    public function classification()
    {
        return $this->belongsTo(ArchiveClassification::class, 'archive_classification_id');
    }

    public function borrowings()
    {
        return $this->hasMany(ArchiveBorrowing::class);
    }
}
