<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
	protected $table = 'batches';

	public function degree(){
		return $this->belongsTo('App\Degree');
	}
    
}
