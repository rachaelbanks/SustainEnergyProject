<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $table = 'vouchers';
    
    protected $fillable = [
        'user_id', 
        'points', 
        'price', 
    ];

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($voucher) {
            $voucher->user->updateVoucherPoints();
        });

        static::deleted(function ($voucher) {
            $voucher->user->updateVoucherPoints();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}