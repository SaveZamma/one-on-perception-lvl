<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'amount', 'currency'];

    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }

    function getCurrencySymbol(): string {
        $locale = substr($this->currency, 0, 2);
        $formatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
        $formatted = $formatter->formatCurrency($this->amount, $this->currency);
        return $formatted;
    }
}
