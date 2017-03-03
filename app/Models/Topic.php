<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Topic extends Model
{
    protected $appends = array('love_count','comment_count','timestamp_content','local_date');

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

    public function getTimestampContentAttribute()
    {
        $published_on = Carbon::createFromFormat('Y-m-d H:i:s', $this->published_on, 'Asia/Bangkok');

        return $published_on->diffForHumans();
    }

    public function getLocalDateAttribute()
    {
        $published_on = Carbon::createFromFormat('Y-m-d H:i:s', $this->published_on, 'Asia/Bangkok');
        $month = $published_on->month;
        switch ($month) {
            case 1:
                $month = 'มกราคม'; break;
            case 2:
                $month = 'กุมภาพันธ์'; break;
            case 3:
                $month = 'มีนาคม'; break;
            case 4:
                $month = 'เมษายน'; break;
            case 5:
                $month = 'พฤษภาคม'; break;
            case 6:
                $month = 'มิถุนายน'; break;
            case 7:
                $month = 'กรกฎาคม'; break;
            case 8:
                $month = 'สิงหาคม'; break;
            case 9:
                $month = 'กันยายน'; break;
            case 10:
                $month = 'ตุลาคม'; break;
            case 11:
                $month = 'พฤศจิกายน'; break;
            case 12:
                $month = 'ธันวาคม'; break;
        }
        return $published_on->day.' '.$month.' '.($published_on->year+543);
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
