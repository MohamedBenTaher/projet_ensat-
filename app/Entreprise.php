<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $fillable = ['Nom','Description','user_id'];

    public function vols(){
        return

        $this->hasMany(Vol::class);
    }

    public function comments(){
        return
        $this->hasMany(Comment::class);
    }
}
