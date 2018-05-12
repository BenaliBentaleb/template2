<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Amies extends Model
{
    use Notifiable;
    protected $fillable = [
        'user_id',
        'friend_id',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
