<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatRomMessage extends Model
{
    protected $fillable = ['message'];

    public function user()
{
  return $this->belongsTo(User::class);
}
}
