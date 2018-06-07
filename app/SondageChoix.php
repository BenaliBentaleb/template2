<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sondage;
use App\SondageChoixUser;

class SondageChoix extends Model
{
    protected $fillable = [
        'sondage_id','choix','nombre_reponse'
    ];

    public function sondage() {
        return $this->belongsTo(Sondage::class);
    }

    public function sondage_choix_user() {
        return $this->hasMany(SondageChoixUser::class);
    }
}
