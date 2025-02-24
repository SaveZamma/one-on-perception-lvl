<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoredProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'storage_id', // TODO consider if this is a vulnerability
        'quantity',
        'price',
        'new',
        'visible'
    ];

    public function storage(): BelongsTo
    {
        return $this->belongsTo(Storage::class);
    }
}
