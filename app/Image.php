<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = ['path'];

    public function vol(){
        return
        $this->belongsTo(Vol::class);
    }
}
