<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone', 'email', 'status', 'clinic_id', 'user_id', 'content', 'star'];
}
