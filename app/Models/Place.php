<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function events()
	{
		return $this->belongsToMany('App\Models\Event', 'event_place_locate');
	}
}
