<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    public funstion room(){
        return $this->hasOne('App\Models\ChatRoom', 'id', 'chat_room_id');
    }

    public funstion user(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
