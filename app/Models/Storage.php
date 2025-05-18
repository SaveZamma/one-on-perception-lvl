<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Storage extends Model
{
    use HasFactory;

    public function shop():HasOne
    {
        return $this->hasOne(Shop::class);
    }
}
