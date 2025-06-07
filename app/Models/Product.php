<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/* New classes can be created using the command `php artisan make:model Product -mfs`.
 * The options `-mfs` will automatically create the migration, the factory and
 * the seeder for the model.
 */
class Product extends Model
{
    use HasFactory;
    // Defines the columns that can be mass assigned during creation.
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'shop_id',
        'quantity',
        'price',
        'new',
        'visible'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id')
            ->using(CategoryProduct::class);
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function orderedProducts(): HasMany
    {
        return $this->hasMany(OrderedProduct::class);
    }
}
