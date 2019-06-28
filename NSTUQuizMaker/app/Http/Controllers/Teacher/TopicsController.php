<?php
namespace App\Http\Controllers\Teacher;

Use App\Topic;
Use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::latest()->get();
        $courses = Course::all();
         return view('teacher.topic.index',compact('topics','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
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
            'name' => 'required',
            'description' => 'required',
        ]);

       $topic = new Topic();
       
       $topic->course_id = $request->course;
       $topic->name = $request->name;
       $topic->description = $request->description;

       $topic->save();
       
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
        $topic = Topic::find($id);
        $courses = Course::all();
         return view('teacher.topic.edit',compact('topic','courses'));
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
            'course' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

      $topic = Topic::find($id);
       
       $topic->course_id = $request->course;
       $topic->name = $request->name;
       $topic->description = $request->description;

       $topic->save();
       
       return redirect(route('topic.index'))->with('message', ' topic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topics = topic::findOrFail($id)->delete();
        return redirect(route('topic.index'))->with('message', "You have deleted topic successfully");
    }
}
