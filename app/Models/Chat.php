<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['to_user_id','from_user_id','chat_message', 'uuid_session', 'type'];

    public function fromContact()
    {
        return $this->hasOne(User::class, 'id', 'from');
    }
}
