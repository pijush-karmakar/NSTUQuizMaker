<?php

namespace App\Http\Controllers\Teacher;

use App\Course;
use App\Teacher;
use App\Test;
use App\TestAssignment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $current_teacher = Auth::guard('teacher')->user()->id;

        $courses = DB::table('courses')
                    ->leftJoin('course_teacher', 'courses.id', '=', 'course_teacher.course_id')
                    ->where('course_teacher.teacher_id', '=', $current_teacher)->get();


        foreach ($courses as $course) {
            $cid = $course->id;

            $course->tests = DB::table('tests')->where('course_id', '=', $cid)->get();

            foreach ($course->tests as $test) {
                $test->assigned_times = TestAssignment::where('test_id', $test->id)->count();
            }

            $course->teachers = DB::table('teachers')
                                ->rightJoin('course_teacher', 'teachers.id', '=', 'course_teacher.teacher_id')
                                ->where('course_teacher.course_id', '=', $cid)->get();

            $course->topics = DB::table('topics')->where('course_id', '=', $cid)->get();
        }


        $teachers = Teacher::all();

        return view('teacher.course.index',compact('courses','teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('teacher.course.create',compact('teachers'));
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
            'teachers' => 'required',
            'course_code' => 'required',
            'title' => 'required',
        ]);

       $course = new Course();
       $course->course_code = $request->course_code;
       $course->title = $request->title;

       $course->save();

       $teachers = $request->teachers;
       $current_teacher = Auth::guard('teacher')->user()->id;

       array_push($teachers, $current_teacher);;
       
       $course->teachers()->attach($teachers);
       
       return redirect(route('course.index'))->with('message', 'New course is stored successfully');
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
    public function edit(Course $course)
    {
        // $course = Course::find($id);
        $teachers = Teacher::all();
         return view('teacher.course.edit',compact('course','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Course $course)
    {
        $this->validate($request,[
           
            'teachers' => 'required',
            'course_code' => 'required',
            'title' => 'required',
        ]);

       // $course = Course::find($id);
       $course->course_code = $request->course_code;
       $course->title = $request->title;

       $course->save();
       $course->teachers()->sync($request->teachers);
       
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
