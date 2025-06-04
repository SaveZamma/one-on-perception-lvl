<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

enum OrderStatus: int {
    case REJECTED = -1;
    case PROCESSING = 0;
    case CONFIRMED = 1;
    case SHIPPED = 2;
    case TRANSIT = 3;
    case DELIVERED = 4;

    public function label(): string {
        return match($this) {
            self::PROCESSING => 'Processing',
            self::CONFIRMED => 'Confirmed',
            self::REJECTED => 'Rejected',
            self::SHIPPED => 'Shipped',
            self::TRANSIT => 'In Transit',
            self::DELIVERED => 'Delivered',
        };
    }
}

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // TODO: consider if this is a vulnerability
        'name',
        'date',
        'title',
        'shipping_code',
        'status',
        'cart',
        'address'
    ];

    public function orderedProducts(): HasMany
    {
        return $this->hasMany(OrderedProduct::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'status' => OrderStatus::class,
    ];
}
