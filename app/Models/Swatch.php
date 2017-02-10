<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Swatch extends Model
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

    public function saveUsers()
    {
        return $this->morphToMany('App\Models\User', 'content', 'content_save');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'content');
    }

    public function colors()
	{
		return $this->belongsToMany('App\Models\Color', 'swatch_color_tone');
	}

    public function products()
	{
		return $this->belongsToMany('App\Models\Product', 'swatch_product_relate');
	}

    public function issues()
	{
		return $this->morphToMany('App\Models\Issue', 'content', 'content_issue_relate');
	}

    public function relateTopicBlocks()
    {
        return $this->morphMany('App\Models\TopicBlock', 'relate_content');
    }

    public function getLoveCountAttribute()
    {
        return $this->loveUsers()->count();
    }

    public function scopeType($query)
    {

    }
}
