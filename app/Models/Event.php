<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $appends = array('date');

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

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'content');
    }

    public function issues()
	{
		return $this->morphToMany('App\Models\Issue', 'content', 'content_issue_relate');
	}

    public function relateTopicBlocks()
    {
        return $this->morphMany('App\Models\TopicBlock', 'relate_content');
    }

    public function getDateAttribute()
    {
        //$date = Carbon::now()->month;
        $start_month = Carbon::createFromFormat('Y-m-d', $this->start_date, 'Asia/Bangkok');
        $end_month = Carbon::createFromFormat('Y-m-d', $this->end_date, 'Asia/Bangkok');

        if ($start_month->month == $end_month->month) {
            return $start_month->format('d').' - '.$end_month->format('d M Y');
        } else {
            return $start_month->format('d M').' - '.$end_month->format('d M Y');
        }
    }

    public function scopeType($query,$type)
    {
        return $query->where('event_type', strtoupper($type));
    }

    public function scopeSortByLates($query)
    {
        return $query->orderBy('id','DESC');
    }
    public function scopeSortByUpcoming($query)
    {
        return $query->whereRaw('CURDATE() <= end_date')->orderBy('start_date','ASC');
    }
}
