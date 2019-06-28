<?php

// namespace Bitfumes\Multiauth\Http\Controllers;
namespace App\Http\Controllers;

use App\Student;
use App\Degree;
use App\Batch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class StudentController extends Controller
{

    public function index()
    {
        // $students = Student::latest()->get();
        $degrees = Degree::all();
        $batches = Batch::all();

       return view('vendor.multiauth.admin.students',compact('degrees','batches'));
    }


    public function show(Request $request)
    {
          $students = Student::where('degree_id', $request->degree)
                            ->where('batch_id',$request->batch)
                            ->get();

          $degrees = Degree::all();
          $batches = Batch::all(); 

          return view('vendor.multiauth.admin.students',compact('students','degrees','batches'));

    }






    public function destroy($id)
    {
        $students = Student::findOrFail($id)->delete();
        return redirect(route('student.index'))->with('message', "You have deleted Student successfully");
    }




}
