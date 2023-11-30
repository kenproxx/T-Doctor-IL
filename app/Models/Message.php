<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'chat_message',
        'message_status'
    ];

    public function fromContact()
    {
        return $this->hasOne(User::class, 'id', 'from_user_id');
    }
}
