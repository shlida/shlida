<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentBlock extends Model
{
    public function parent()
	{
		return $this->belongsTo('App\Models\Comment', 'comment_id');
	}
}
