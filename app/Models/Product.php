<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function blocks()
	{
		return $this->belongsToMany('App\Models\TopicBlock', 'topic_block_product_relate', 'product_id', 'block_id');
	}

    public function swatch()
	{
		return $this->belongsToMany('App\Models\Swatch', 'swatch_product_relate');
	}
}
