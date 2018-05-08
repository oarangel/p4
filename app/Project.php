<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function framesize()
    {
    #Project belongs to Framesize
    return $this->belongsTo('App\Framesize');
    }
}
