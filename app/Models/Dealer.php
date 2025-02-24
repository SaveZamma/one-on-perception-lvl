<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dealer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'identification_code',
        'nation'
    ];

    public function storage(): HasOne
    {
        return $this->hasOne(Storage::class);
    }
}
