<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transaction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'quantity',
        'status',
    ];

    public function cart(): HasOne
    {
        return $this->HasOne(Cart::class);
    }

    public function sellers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, foreignPivotKey: 'seller_id');
    }
}
