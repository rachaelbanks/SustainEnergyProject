<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'carbon_points', 
        'renewable_points', 
        'waste_points', 
        'water_points',
        'supply_points', 
        'biodiversity_points', 
        'energy_points', 
        'products_points', 
        'transportation_points', 
        'packaging_points',
        'total_points'
    ];

    protected $appends = ['total_points'];

        public function getTotalPointsAttribute()
        {
            $total = 0;
            $attributes = ['carbon_points', 'renewable_points', 'waste_points', 'water_points', 'supply_points', 'biodiversity_points', 'energy_points', 'products_points', 'transportation_points', 'packaging_points'];
            
            foreach ($attributes as $attribute) {
                switch ($this->$attribute) {
                    case 'red':
                        // Red points add 0 to the total
                        break;
                    case 'orange':
                        // Orange points add 5 to the total
                        $total += 5;
                        break;
                    case 'green':
                        // Green points add 10 to the total
                        $total += 10;
                        break;
                    default:
                        error_log("Unexpected value encountered for attribute: $attribute");
                        break;
                }
            }
    
            return $total;
        }
    
        protected static function booted()
        {
            static::saving(function ($point) {
                // Calculate the total points
                $point->total_points = $point->getTotalPointsAttribute();
            });
        }

        // for total earned points
        protected static function boot()
        {
            parent::boot();
    
            static::saved(function ($point) {
                $point->user->updateEarnedPoints();
            });
    
            static::deleted(function ($point) {
                $point->user->updateEarnedPoints();
            });
        }
    
        public function user()
        {
            return $this->belongsTo(User::class);
        }
    }