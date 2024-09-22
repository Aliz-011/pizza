<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoryItem extends Model
{
    use HasFactory, HasUlids;

    public function story(): BelongsTo {
        return $this->belongsTo(\App\Models\Story::class);
    }
}
