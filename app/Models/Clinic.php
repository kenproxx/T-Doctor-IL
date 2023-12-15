<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address_detail', 'address', 'open_date', 'close_date', 'user_id',
        'introduce', 'gallery', 'status', 'name_en', 'address_detail_en',
        'latitude', 'longitude','experience', 'emergency', 'insurance', 'parking', 'information', 'facilities', 'equipment', 'costs'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function nation()
    {
        return $this->hasMany(Nation::class);
    }

    public function province()
    {
        return $this->hasMany(Province::class);
    }

    public function district()
    {
        return $this->hasMany(District::class);
    }

    public function commune()
    {
        return $this->hasMany(Commune::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'clinic_id', 'id');
    }
}
