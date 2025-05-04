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
        'storage_id', // TODO consider if this is a vulnerability
        'quantity',
        'price',
        'new',
        'visible'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function storage(): BelongsTo
    {
        return $this->belongsTo(Storage::class);
    }

    public function orderedProducts(): HasMany
    {
        return $this->hasMany(OrderedProduct::class);
    }
}
