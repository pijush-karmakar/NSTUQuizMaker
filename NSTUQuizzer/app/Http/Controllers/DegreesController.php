<?php

namespace App\Http\Controllers;

Use App\Department;
use App\Degree;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DegreesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $degrees = Degree::oldest()->get();
         $departments = Department::all();
        return view('vendor.multiauth.admin.degree.index',compact('degrees','departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('vendor.multiauth.admin.degree.create',compact('departments'));
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
            'short_title' => 'required',
            'full_title' => 'required',
            'department_id' => 'required',
        ]);

       $degree = new degree();
       
       
       $degree->short_title = $request->short_title;
       $degree->full_title = $request->full_title;
       $degree->department_id = $request->department_id;

       $degree->save();
       
       return redirect(route('degree.index'))->with('message', 'New degree is stored successfully');
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
         $degree = Degree::find($id);
         $departments = Department::all();
        return view('vendor.multiauth.admin.degree.edit',compact('degree','departments'));
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
            'short_title' => 'required',
            'full_title' => 'required',
            'department_id' => 'required',
        ]);

       $degree = Degree::find($id);   
       
       $degree->short_title = $request->short_title;
       $degree->full_title = $request->full_title;
       $degree->department_id = $request->department_id;

       $degree->save();
       
       return redirect(route('degree.index'))->with('message', ' degree is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $degree = Degree::find($id); 
        $degree->delete();
         return redirect(route('degree.index'))->with('message', ' degree is deleted successfully');
    }
}
