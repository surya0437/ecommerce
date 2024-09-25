<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function vendor():BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function order_descriptions():HasMany
    {
        return $this->hasMany(OrderDescription::class);
    }

    public function carts():HasMany
    {
        return $this->hasMany(Cart::class);
    }

}
