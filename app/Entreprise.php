<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $fillable = ['Nom','Description'];

    public function vols(){
        return
        $this->hasMany(Vol::class);
    }

    public function comments(){
        return
        $this->hasMany(Comment::class);
    }
}
