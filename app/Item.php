<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function itemtype(){
    	return $this->belongsTo('App\Itemtype');
    }
    public function itemcategory(){
    	return $this->belongsTo('App\Itemcategories');
    }
}
