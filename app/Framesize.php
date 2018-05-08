<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Framesize extends Model
{
    public function projects()
    {
    #Framesize has many Projects
    return $this->hasMany('App\Project');
    }
}
