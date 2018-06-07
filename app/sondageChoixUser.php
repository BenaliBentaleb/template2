<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SondageChoix;
class sondageChoixUser extends Model
{
   protected $fillable = [
       'user_id',
       'sondage_choix_id'
   ];


   public function sondage_choix() {
       return $this->belongsTo(SondageChoix::class);
   }
}
