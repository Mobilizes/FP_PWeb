<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
}
