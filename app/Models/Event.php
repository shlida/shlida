<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function places()
	{
		return $this->belongsToMany('App\Models\Place', 'event_place_locate');
	}

    public function loveUsers()
    {
        return $this->morphToMany('App\Models\User', 'content', 'content_love');
    }

    public function saveUsers()
    {
        return $this->morphToMany('App\Models\User', 'content', 'content_save');
    }

    public function issues()
	{
		return $this->morphToMany('App\Models\Issue', 'content', 'content_issue_relate');
	}

    public function relateTopicBlocks()
    {
        return $this->morphMany('App\Models\TopicBlock', 'relate_content');
    }
}
