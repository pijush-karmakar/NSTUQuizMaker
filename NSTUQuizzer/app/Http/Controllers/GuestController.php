<?php

namespace App\Http\Controllers;
use App\Student;
use Carbon\Carbon;
use Redirect,Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    public function test() {
        $students = Student::where('student_id', 'ASH0701005M')->get();

        return view('student.test', compact('students'));
    }
}
