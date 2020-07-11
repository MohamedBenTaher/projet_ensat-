<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    public function vols(){
        return
        $this->hasMany(Vol::class);
    }

    public function comments(){
        return
        $this->hasMany(Comment::class);
    }
}
