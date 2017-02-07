<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicBlock extends Model
{
    public function parent()
	{
		return $this->belongsTo('App\Models\Topic', 'topic_id');
	}

    public function relateContent()
    {
        return $this->morphTo('relate_content');
    }
}
