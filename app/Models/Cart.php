<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = ['user_id', 'token', 'total_amount'];

    protected $with = ['cartItems'];

    /**
     * Get the items inside the cart.
     */
    public function cartItems(): HasMany {
        return $this->hasMany(\App\Models\CartItem::class);
    }

     /**
     * Get the user that owns the cart.
     */
    public function user():BelongsTo {
        return $this->belongsTo(\App\Models\User::class);
    }

    public static function getCartItems($userId) {
        $cart = DB::table('carts')
                    ->where('carts.user_id', $userId)
                    ->join('cart_items', 'carts.id', '=', 'cart_items.cart_id')
                    ->join('product_items', 'product_items.id', '=', 'cart_items.product_item_id')
                    ->join('products', 'products.id', '=', 'product_items.product_id')
                    ->select(
                        'carts.total_amount', 
                        'carts.id', 
                        'cart_items.quantity', 
                        'product_items.price', 
                        'product_items.size', 
                        'product_items.pizza_type', 
                        'products.image_url', 
                        'products.name'
                    )
                    ->get();
        
        return $cart;
    }

    public static function subtotal($userId) {
        $total = DB::table('carts')
                    ->selectRaw('SUM(cart_items.quantity * product_items.price) as total')
                    ->join('cart_items', 'carts.id', '=', 'cart_items.cart_id')
                    ->join('product_items', 'product_items.id', '=', 'cart_items.product_item_id')
                    ->where('carts.user_id', $userId)
                    ->get();
        
        return $total;
    }
}