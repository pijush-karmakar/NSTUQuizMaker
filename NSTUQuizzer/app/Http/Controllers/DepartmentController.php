<?php

// namespace Bitfumes\Multiauth\Http\Controllers;
namespace App\Http\Controllers;

Use App\Department;
Use App\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::oldest()->get();
        return view('vendor.multiauth.admin.department.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $faculties = Faculty::all();
          return view('vendor.multiauth.admin.department.create',compact('faculties'));
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
            'name' => 'required',
            'faculty' => 'required',
            'short_name' => 'required',
        ]);

       $department = new Department();
       
       $department->faculty_id = $request->faculty;
       $department->name = $request->name;
       $department->short_name = $request->short_name;

       $department->save();
       
       return redirect(route('department.index'))->with('message', 'New Department is stored successfully');

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
        $department = Department::find($id);
        $faculties = Faculty::all();
        return view('vendor.multiauth.admin.department.edit',compact('department','faculties'));
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
            'name' => 'required',
            'faculty' => 'required',
            'short_name' => 'required'
        ]);

       $department = Department::find($id);
       
       $department->faculty_id = $request->faculty;
       $department->name = $request->name;
       $department->short_name = $request->short_name;

       $department->save();
       
       return redirect(route('department.index'))->with('message', ' Department Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $department = Department::find($id);
       $department->delete();
       return redirect(route('department.index'))->with('message', ' Department deleted successfully');
    }
}
