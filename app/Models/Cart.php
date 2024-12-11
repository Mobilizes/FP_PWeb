<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
    ];
    
    public function buyer(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function transaction(): HasOne
    {
        return $this->hasOne(Transaction::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'cart_product')->withPivot('quantity');
    }

    public function totalPrice(): int
    {
        $products = $this->products;
        $total = 0;

        foreach ($products as $product) {
            $total += $product->price * $product->pivot->quantity;
        }

        return $total;
    }
}
