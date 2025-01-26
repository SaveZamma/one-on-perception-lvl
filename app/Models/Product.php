<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Created using the command `php artisan make:model Product -mfs`.
 * The options `-mfs` will automatically create the migration, the factory and
 * the seeder for the model.
 */
class Product extends Model
{
    // Defines the columns that can be mass assigned during creation.
    protected $fillable = ['name', 'description', 'price'];

    use HasFactory;
}
