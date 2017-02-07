<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public function parent()
	{
		if($this->parent_id !== null){
			return $this->belongsTo('App\Models\Issue');
		} else {
			return null;
		}
	}

	public function childs()
	{
		return $this->hasMany('App\Models\Issue', 'parent_id');
	}

	public function treeChilds()
	{
		return $this->childs()->with('treeChilds');
	}

    /**
    * Related Content
    *
    */
    public function relateTopics()
    {
        return $this->morphedByMany('App\Models\Topic', 'content', 'content_issue_relate');
    }

    public function relateSwatch()
    {
        return $this->morphedByMany('App\Models\Swatch', 'content', 'content_issue_relate');
    }

    public function relateEvents()
    {
        return $this->morphedByMany('App\Models\Event', 'content', 'content_issue_relate');
    }
}
