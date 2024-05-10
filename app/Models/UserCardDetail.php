<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCardDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'card_number',
        'card_expiry',
        'card_cvv',
    ];

    // Define relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}