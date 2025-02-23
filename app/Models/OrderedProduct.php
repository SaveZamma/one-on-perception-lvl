<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedProduct extends Model
{
    protected $fillable = [
        'product_id',
        'order_id',
        'storage_id',
        'quantity'
    ];

    use HasFactory;
}
