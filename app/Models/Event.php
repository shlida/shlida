<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $appends = array('date','love_count','comment_count');

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

    public function getLoveCountAttribute()
    {
        $love = $this->loveUsers()->count();
        if($love / 1000 >= 1) {
            $love_decimal = bcdiv($love / 1000, 1, 1);
            $love = explode(".", $love_decimal);
            $love = ($love[1]>0) ? $love_decimal : $love[0];
            return $love.'k';
        } else {
            return $love;
        }
    }

    public function getCommentCountAttribute()
    {
        return $this->comments()->count();
    }

    public function scopeType($query,$type)
    {
        foreach ($type as $key => $value) {
            if ($key == 0)
                $query->where('event_type', strtoupper($value));
            else
                $query->orWhere('event_type', strtoupper($value));
        }
    }

    public function scopeSort($query,$sort)
    {
        if($sort == 'end')
            return $query->whereRaw('CURDATE() > end_date')->orderBy('start_date','DESC');
        if($sort == 'upcoming')
            return $query->whereRaw('CURDATE() < start_date')->orderBy('start_date','ASC');
        if($sort == 'now')
            return $query->whereRaw('CURDATE() BETWEEN start_date AND end_date')->orderBy('start_date','DESC');
    }

    public function scopeDate($query,$date)
    {
        return $query->whereRaw("'$date' BETWEEN start_date AND end_date")->orderBy('start_date','DESC');
    }
}
