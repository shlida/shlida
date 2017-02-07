<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function swatch()
  	{
  		return $this->belongsToMany('App\Models\Swatch', 'swatch_color_tone');
  	}
}
