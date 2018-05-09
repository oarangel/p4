<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function tags()
    {
    #Project belongs to Tag
    return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
