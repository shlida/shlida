<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'content_report';

    public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

    public function reason()
    {
        return $this->belongsTo('App\Models\ReportReason');
    }

    public function content()
    {
        return $this->morphTo('content');
    }
}
