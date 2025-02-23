<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', // TODO: consider if this is a vulnerability
        'address_id', // TODO: consider if this is a vulnerability
        'date',
        'title',
        'shipping_code',
    ];

    use HasFactory;
}
