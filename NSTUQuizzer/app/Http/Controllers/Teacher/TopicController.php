<?php

namespace App\Http\Controllers\Teacher;

use App\Course;
use App\Topic;
// use App\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_teacher = Auth::guard('teacher')->user()->id;

        $courses = DB::table('courses')
                    ->leftJoin('course_teacher', 'courses.id', '=', 'course_teacher.course_id')
                    ->where('course_teacher.teacher_id', '=', $current_teacher)->get();

        foreach ($courses as $course) {
            $cid = $course->id;          

            $course->topics = DB::table('topics')->where('course_id', '=', $cid)->get();
        }

        return view('teacher.topic.index',compact('courses'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $current_teacher = Auth::guard('teacher')->user()->id;

        $courses = DB::table('courses')
                    ->leftJoin('course_teacher', 'courses.id', '=', 'course_teacher.course_id')
                    ->where('course_teacher.teacher_id', '=', $current_teacher)->get();

        return view('teacher.topic.create',compact('courses'));
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
            'course' => 'required',
            'topic_name' => 'required',
        ]);

       $topic = new Topic();
       
       $topic->course_id = $request->course;
       $topic->topic_name = $request->topic_name;

       $topic->save();

       // $topic->tests()->attach($request->tests);
       
       return redirect(route('topic.index'))->with('message', 'New topic is stored successfully');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function test_result(){
        return view('teacher.test_result');
    }


}
