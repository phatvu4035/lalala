<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\BroadcastChat;

class Chat extends Model
{
    protected $fillable = ['user_id', 'friend_id', 'chat'];

    protected $table = 'chats';

    protected $dispatchesEvents = [
		'created' => BroadcastChat::class
    ];
}
