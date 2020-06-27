<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    public function entreprise(){
        return
        $this->belongsTo(Entreprise::class);
    }
}
