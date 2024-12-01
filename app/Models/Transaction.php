<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'admin_id',
        'buyer_id',
        'product_id',
        'quantity',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaction) {
            self::validateAdmin($transaction->admin_id);
        });

        static::updating(function ($transaction) {
            self::validateAdmin($transaction->admin_id);
        });
    }

    private static function validateAdmin($adminId)
    {
        if ($adminId === null) {
            return;
        }

        $admin = User::where('id', $adminId)->first();
        if ($admin->role !== 'admin') {
            throw ValidationException::withMessages(['admin_id' => 'The admin_id must reference a user with the role of admin.']);
        }
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
