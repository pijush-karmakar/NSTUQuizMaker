<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
       public function faculty()
    {
        return $this->belongsTo('App\Faculty');
    }

    public function teachers()
    {
        return $this->hasMany('App\Teacher');
    }
}
