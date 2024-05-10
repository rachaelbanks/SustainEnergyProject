<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserCardDetail;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'earned_points',
        'voucher_points',
        'total_points', 
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }

    public function updateVoucherPoints()
    {
        $this->voucher_points = $this->vouchers()->sum('points');
        $this->save();
    }

    // to recieve earned_points
    public function points()
    {
        return $this->hasOne(Point::class);
    }

    public function getEarnedPointsAttribute()
    {
        return $this->points->total_points ?? 0;
    }

    public function updateEarnedPoints()
    {
        $this->earned_points = $this->points()->sum('total_points');
        $this->save();
    }

    // Calculating total_points for each user
    public function getVoucherPointsAttribute()
    {
        return $this->vouchers()->sum('points');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($user) {
            $user->total_points = $user->earned_points + $user->voucher_points;
        });
    }

    // Define the relationship with UserCardDetail
    public function userCardDetail()
    {
        return $this->hasOne(UserCardDetail::class);
    }


}
