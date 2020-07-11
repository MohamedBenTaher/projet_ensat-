<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    public function user(){
        return $this->belongsTo(user::class);
    }
    public function comment(){
        return $this->belongsTo(Comment::class);
    }
}
