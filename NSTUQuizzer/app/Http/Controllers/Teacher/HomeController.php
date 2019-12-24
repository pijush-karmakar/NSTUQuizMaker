<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    protected $redirectTo = '/teacher/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('teacher.auth:teacher');
    }

    /**
     * Show the Teacher dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $current_teacher = Auth::guard('teacher')->user()->id;

        $total_courses = DB::table('course_teacher')->where('teacher_id', '=', $current_teacher)->count();
        $total_questions = DB::table('questions')->count(); //wrong, but just for now
        $total_tests = DB::table('tests')->count();  //wrong, but just for now

        $insights = [
            'total_courses' => $total_courses,
            'total_questions' => $total_questions,
            'total_tests' => $total_tests
        ];

        

        return view('teacher.home', $insights);
    }

}