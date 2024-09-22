<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductItem extends Model
{
    use HasFactory, HasUlids;

    protected $primaryKey = 'id';

    protected $fillable = ['price', 'size', 'pizza_type', 'product_id'];

    /**
     * Get the product that owns the product's items
     */
    public function product(): BelongsTo {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }

    public function cartItems(): HasMany {
        return $this->hasMany(\App\Models\CartItem::class);
    }
}
