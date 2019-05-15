<?php

// namespace Bitfumes\Multiauth\Http\Controllers;
namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class StudentController extends Controller
{
     public function index()
    {
       $students = Student::latest()->get();
       return view('vendor.multiauth.admin.students',compact('students'));
    }

    public function destroy($id)
    {
        $students = Student::findOrFail($id)->delete();
        return redirect(route('student.index'))->with('message', "You have deleted Student successfully");
    }




}
