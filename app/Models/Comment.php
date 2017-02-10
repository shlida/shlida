<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $appends = array('love_count');

    public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

    public function loveUsers()
    {
        return $this->morphToMany('App\Models\User', 'content', 'content_love');
    }

    public function blocks()
	{
		return $this->hasMany('App\Models\CommentBlock');
	}

	public function content()
    {
        return $this->morphTo('content');
    }

    public function replies()
    {
        return $this->morphMany('App\Models\Comment', 'content');
    }

    public function getLoveCountAttribute()
    {
        return $this->loveUsers()->count();
    }
}
