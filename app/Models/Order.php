<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function order_descriptions(): HasMany
    {
        return $this->hasMany(OrderDescription::class);
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(vendor::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function shipping_address():BelongsTo
    {
        return $this->belongsTo(ShippingAddress::class);
    }
}
