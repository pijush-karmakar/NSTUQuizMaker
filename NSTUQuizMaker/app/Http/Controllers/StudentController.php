<?php

// namespace Bitfumes\Multiauth\Http\Controllers;
namespace App\Http\Controllers;

use App\Student;
use App\Degree;
use App\Batch;
use App\Math;
use App\Form;
use Carbon\Carbon;
use Redirect,Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;



class StudentController extends Controller
{

    public function index()
    {
       
    $degrees = Degree::all()->pluck('short_title', 'id')
    ->prepend('-- Select --', '');

    return view('vendor.multiauth.admin.students', compact('degrees'));

    }



public function show(Request $request)
{
      $students = Student::where('degree_id', $request->degree)
                        ->where('batch_id',$request->session)
                        ->get();

      $degrees = Degree::all();
      $batches = Batch::all(); 

      return view('vendor.multiauth.admin.students_show',compact('students','degrees','batches'));

}

   
    public function createCode(Request $request){   
       $std_id = $request->std_id;    
       $student = Student::find($std_id);   
       $current_timestamp = Carbon::now()->timestamp; // 
       $to_hash = $id.$current_timestamp;
       $hash = strval(Hash::make($to_hash));       
       $reg_code = Math::to_base($hash, 62);
      
       $student->registration_code = $reg_code;

       $response  = ['success' => true, 'reg_code' => '', 'error' => ''];
       
       if($student->save())
       {
          $response['reg_code'] = $student->registration_code;         
       }
       else
       {
          $response['success'] = false; 
          $response['error'] = 'Database operation failed';
       }

       return response()->json($response);
    }

    public function codeall(Request $request){
       // $student = new Student();
       // // $student->registration_code = $request->registration_code;
       // $current_timestamp = Carbon::now()->timestamp; // 
       // $base62 = Math::to_base($current_timestamp, 62);
       // // $student->registration_code = date("y").substr(number_format(time() * mt_rand(),0,'',''),0,6);
       // $student->registration_code = $base62;
       // $student->save(); 
       //   return redirect(route('student.index'))->with('message', 'Registration code created successfully for All');
    }







    public function destroy($id)
    {
        $students = Student::findOrFail($id)->delete();
        return redirect(route('student.index'))->with('message', "You have deleted Student successfully");
    }




}
