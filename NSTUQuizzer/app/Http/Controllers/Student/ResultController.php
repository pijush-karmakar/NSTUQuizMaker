<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    public function result(){
    	return view('student.result');
    }

    public function test(){
    	return view('student.test');
    }


}
