<?php

namespace App;
//namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{

    protected $fillable = ['ville_dep','ville_arr','date_dep','date_arr','heure_dep','heure_arr','classe','prix','num_places','entreprise_id','user_id'];

    public function entreprise(){
        return
        $this->belongsTo(Entreprise::class);
    }
   
    public function image(){
        return
        $this->hasOne(Image::class);
    }
}
