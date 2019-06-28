<?php

namespace App\Http\Controllers\Teacher;

use App\Question_type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Question_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Question_type::latest()->get();
        return view ('teacher.Question_type.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('teacher.Question_type.create');
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
            'type_name' => 'required'
        ]);

       $type = new Question_type();
       
       $type->type_name = $request->type_name;

       $type->save();
       
       return redirect(route('type.index'))->with('message', 'New type is stored successfully');
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
         $type = Question_type::find($id);
         return view('teacher.Question_type.edit',compact('type'));
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
            'type_name' => 'required'
        ]);

       $type = Question_type::find($id);
       
       $type->type_name = $request->type_name;

       $type->save();
       
       return redirect(route('type.index'))->with('message', ' type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $types = Question_type::findOrFail($id)->delete();
        return redirect(route('type.index'))->with('message', "You have deleted type successfully");
    }
}
