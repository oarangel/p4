<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function projects()
    {
        #Project belongs to Tag
        return $this->belongsToMany('App\Project')->withTimestamps();
    }

    public function getForCheckboxes()
    {
        $tags = self::orderBy('name')->get;
        $tagsForCheckboxes = [];

        foreach($tags as $tag) {
            $tagsForCheckboxes[$tag->id] = $tag->name;
        }
        return $tagsForCheckboxes;
    }
}