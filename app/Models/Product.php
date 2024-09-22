<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = ['name', 'image_url', 'category_id'];

    /**
     * Get the category that owns the products.
     */
    public function category(): BelongsTo {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function ingredients(): BelongsToMany {
        return $this->belongsToMany(\App\Models\Ingredient::class, 'products_has_ingredients');
    }

    /**
     * Get the product's items inside the product.
     */
    public function productItems(): HasMany {
        return $this->hasMany(\App\Models\ProductItem::class);
    }
}
