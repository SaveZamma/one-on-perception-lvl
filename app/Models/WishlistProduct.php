<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WishlistProduct extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = null;

    protected $fillable = [
        'wishlist_id',
        'product_id',
        'user_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function list(): BelongsTo
    {
        return $this->belongsTo(Wishlist::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
