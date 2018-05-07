<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Amies extends Model
{
    protected $fillable = [
        'user_id',
        'friend_id',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
