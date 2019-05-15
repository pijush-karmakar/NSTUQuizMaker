<?php

// namespace Bitfumes\Multiauth\Http\Controllers;
namespace App\Http\Controllers;

use App\Course;
use App\Batch;
use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $courses = course::latest()->get();
       $batches = Batch::all();
       $teachers = Teacher::all();

        return view('vendor.multiauth.course.index',compact('courses','batches','teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batches = Batch::all();
        $teachers = Teacher::all();
         return view('vendor.multiauth.course.create',compact('batches','teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'batch' => 'required',
            'teacher' => 'required',
            'course_code' => 'required',
            'title' => 'required',
            'term' => 'required',
            'credit' => 'required',
            'credit_hours' => 'required',
            'abstract' => 'required',
            'description' => 'required',
        ]);

       $course = new Course();
       
       $course->batch_id = $request->batch;
       $course->teacher_id = $request->teacher;
       $course->course_code = $request->course_code;
       $course->title = $request->title;
       $course->term = $request->term;
       $course->credit = $request->credit;
       $course->credit_hours = $request->credit_hours;
       $course->abstract = $request->abstract;
       $course->description = $request->description;

       $course->save();
       
       return redirect(route('course.index'))->with('message', 'New Course is stored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $batches = Batch::all();
        $teachers = Teacher::all();
         return view('vendor.multiauth.course.edit',compact('course','batches','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'batch' => 'required',
            'teacher' => 'required',
            'course_code' => 'required',
            'title' => 'required',
            'term' => 'required',
            'credit' => 'required',
            'credit_hours' => 'required',
            'abstract' => 'required',
            'description' => 'required',
        ]);

       $course = Course::find($id);
       
       $course->batch_id = $request->batch;
       $course->teacher_id = $request->teacher;
       $course->course_code = $request->course_code;
       $course->title = $request->title;
       $course->term = $request->term;
       $course->credit = $request->credit;
       $course->credit_hours = $request->credit_hours;
       $course->abstract = $request->abstract;
       $course->description = $request->description;

       $course->save();
       
       return redirect(route('course.index'))->with('message', ' Course is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courses = course::findOrFail($id)->delete();
        return redirect(route('course.index'))->with('message', "You have deleted course successfully");
    }
}
