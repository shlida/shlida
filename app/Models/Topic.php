<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Topic extends Model
{
    protected $appends = array('love_count','comment_count','timestamp_content');

    public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

    public function loveUsers()
    {
        return $this->morphToMany('App\Models\User', 'content', 'content_love');
    }

    public function saveUsers()
    {
        return $this->morphToMany('App\Models\User', 'content', 'content_save');
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

    public function getLoveCountAttribute()
    {
        return $this->loveUsers()->count();
    }

    public function getCommentCountAttribute()
    {
        return $this->comments()->count();
    }

    public function gettimestampContentAttribute()
    {
        $published_on = Carbon::createFromFormat('Y-m-d H:i:s', $this->published_on, 'Asia/Bangkok');

        return $published_on->diffForHumans();
    }

    public function scopeType($query,$type)
    {
        return $query->where('topic_type', strtoupper($type));
    }

    public function scopeDatePublish($query,$date)
    {
        return $query->whereDate('published_on', $date);
    }
}
