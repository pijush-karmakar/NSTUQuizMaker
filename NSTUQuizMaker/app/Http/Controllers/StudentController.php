<?php

// namespace Bitfumes\Multiauth\Http\Controllers;
namespace App\Http\Controllers;

use Mail;
use App\Student;
use App\Degree;
use App\Batch;
use App\Math;
use App\Form;
use Carbon\Carbon;
use Redirect,Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;



class StudentController extends Controller
{

<<<<<<< HEAD
    public function index()
    {
       
    $degrees = Degree::all()->pluck('short_title', 'id')
    ->prepend('-- Select --', '');

    return view('vendor.multiauth.admin.students', compact('degrees'));

    }

=======
   public function index()
   {        
      $degrees = Degree::all();
      return view('vendor.multiauth.admin.students', compact('degrees'));
   }
>>>>>>> 9482d7d8de23b28d82ae6075edd49cf290870150

   public function show(Request $request)
   {
         $students = Student::where('degree_id', $request->degree)
                           ->where('batch_id',$request->batch)
                           ->get();

         //var_dump($request->batch);

         $degree = Degree::find($request->degree);
         $batch = Batch::find($request->batch);

         return view('vendor.multiauth.admin.students_show',compact('students','degree','batch'));
   }

   
   public function createCode(Request $request){   
      $response  = ['success' => false, 'reg_code' => '', 'error' => ''];

      if($request->std_id)
      {
         $std_id = $request->std_id;  
         $student = Student::find($std_id);   

         /*
         for($i=1; $i<20;$i++)
         {
            $ct = Carbon::now()->timestamp;
            $th = $i.$ct;
            $h = Crypt::encryptString(hash("md5", $th));
            $hi = hexdec($h);     
            $rc = Math::to_base($hi, 36);
            $rc = strtoupper(substr($rc, 1, 12));
            var_dump($rc);  
         }
         */

         $current_timestamp = Carbon::now()->timestamp;
         $to_hash = $std_id.$current_timestamp;
         $hash = Crypt::encryptString(hash("md5", $to_hash)); 
         $hash_dec = hexdec($hash);
         $reg_code = strtoupper(substr(Math::to_base($hash_dec, 36), 1, 12));
         $student->registration_code = $reg_code;      
         
         if($student->save())
         {
            $response['success'] = true; 
            $response['reg_code'] = $student->registration_code;         
         }
         else
         {         
            $response['error'] = 'Database operation failed';
         }
      }

      return response()->json($response);
   }

   public function createMultipleCodes(Request $request){
      
   }

<<<<<<< HEAD
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
=======
   public function mailCode(Request $request){   
      $response  = ['success' => false, 'error' => ''];
>>>>>>> 9482d7d8de23b28d82ae6075edd49cf290870150

      if($request->std_id)
      {
         $std_id = $request->std_id;  
         $student = Student::find($std_id);   

         //var_dump($student->email);

         if($student->email && $student->registration_code)
         {
            Mail::send('mail.regcode', ['student' => $student], function($message) use ($student)
            {
               $message->from('noreply.nstuquiz@tlabsinc.com', 'NSTU Quiz Maker');
               $message->to($student->email, $student->name)->subject('Your registration code for NSTU Quiz Maker');
            });

            $response['success'] = true; 
         }
      }
      
      return response()->json($response);
   }

   public function destroy($id)
   {
      $students = Student::findOrFail($id)->delete();
      return redirect(route('student.index'))->with('message', "You have deleted the student successfully");
   }
}
