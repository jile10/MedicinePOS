<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itemcategories extends Model
{
    public function itemtype(){
    	return $this->belongsTo('App\Itemtype');
    }
}
