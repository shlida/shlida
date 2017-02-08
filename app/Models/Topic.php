<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

    public function loveUsers()
    {
        return $this->morphedByMany('App\Models\User', 'content', 'content_love');
    }

    public function saveUsers()
    {
        return $this->morphedByMany('App\Models\User', 'content', 'content_save');
    }

    public function blocks()
	{
		return $this->hasMany('App\Models\TopicBlock', 'topic_id');
	}

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'content');
    }

    public function issues()
	{
		return $this->morphToMany('App\Models\Issue', 'content', 'content_issue_relate');
	}
}
