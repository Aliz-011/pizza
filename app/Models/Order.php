<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = ['user_id', 'token', 'total_amount', 'status', 'items', 'address', 'comment'];

    public function user():BelongsTo {
        return $this->belongsTo(\App\Models\User::class);
    }
}
