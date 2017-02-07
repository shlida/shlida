<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userProfile()
	{
		return $this->hasOne('App\Models\UserProfile');
	}

    public function userSocialChannels()
	{
		return $this->hasMany('App\Models\UserSocialChannel');
	}

    public function following()
  	{
  		return $this->belongsToMany('App\Models\User', 'user_follow', 'user_id', 'following_id');
  	}

    public function follower()
  	{
  		return $this->belongsToMany('App\Models\User', 'user_follow', 'following_id', 'user_id');
  	}

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function reports()
    {
        return $this->hasMany('App\Models\Report');
    }

    /**
     * Save Relations
     *
     *
     */
    public function saveTopics()
    {
        return $this->morphedByMany('App\Models\Topic', 'content', 'content_save');
    }

    public function saveSwatch()
    {
        return $this->morphedByMany('App\Models\Swatch', 'content', 'content_save');
    }

    public function saveEvents()
    {
        return $this->morphedByMany('App\Models\Event', 'content', 'content_save');
    }
}
