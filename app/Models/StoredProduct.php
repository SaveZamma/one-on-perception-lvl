<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoredProduct extends Model
{
    protected $fillable = [
        'storage_id', // TODO consider if this is a vulnerability
        'quantity',
        'price',
        'new',
        'visible'
    ];

    use HasFactory;
}
