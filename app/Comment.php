<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function entreprise(){
        return
        $this->belongsTo(Entreprise::class);
    }

    public function user(){
        return
        $this->belongsTo(User::class);
    }
}
