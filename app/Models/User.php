<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'password',
        'role',
        'balance',
        'current_cart_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'seller_id');
    }

    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class, 'buyer_id');
    }

    public function freebie(): HasMany
    {
        return $this->hasMany(Freebie::class, 'donator_id');
    }
    
    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class, 'buyer_id');
    }

    public function current_cart()
    {
        return $this->cart()->find($this->current_cart_id);
    }
}
