<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'from',
        'to',
        'text',
        'read'
    ];

    public function fromContact()
    {
        return $this->hasOne(User::class, 'id', 'from_user_id');
    }
}
