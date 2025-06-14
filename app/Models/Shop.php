<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['name', 'description', 'email', 'user_id'];

    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
