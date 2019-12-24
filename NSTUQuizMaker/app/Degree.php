<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
	protected $table = 'degrees';

    public function batches(){
		return $this->hasMany('App\Batch');
	}
}
