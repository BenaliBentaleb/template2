<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Event extends Model
{
   protected $fillable  = [
            'user_id',
            'titre',
            'contenu',
            'debut',
            'fin'
   ];

   public function user() {
       return $this->belongsTo(User::class);
   }




}
