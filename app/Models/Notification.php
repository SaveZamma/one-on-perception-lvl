<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'text', 'user_id', 'read'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
