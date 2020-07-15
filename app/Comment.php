<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content','user_id'];
    public function entreprise(){
        return
        $this->belongsTo(Entreprise::class);
    }

    public function user(){
        return
        $this->belongsTo(User::class);
    }
    public function likes(){
        return $this->hasMany(Likes::class);
    }
    public function dislikes(){
        return $this->hasMany(Dislikes::class);
    }
}
