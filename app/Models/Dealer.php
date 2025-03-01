<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dealer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'identification_code',
        'country'
    ];

    public function storage(): BelongsTo
    {
        return $this->belongsTo(Storage::class);
    }
}
