<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = ['cart_id', 'product_item_id', 'quantity'];

    /**
     * Get the cart that owns the items.
     */
    public function cart(): BelongsTo {
        return $this->belongsTo(\App\Models\Cart::class);
    }

    /**
     * Get the product item(variants) that related to the cart item.
     */
    public function productItem(): BelongsTo {
        return $this->belongsTo(\App\Models\ProductItem::class);
    }
}
