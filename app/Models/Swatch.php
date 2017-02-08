<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Swatch extends Model
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
}
