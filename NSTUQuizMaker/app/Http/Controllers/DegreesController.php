<?php

namespace App\Http\Controllers;

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
        return view('vendor.multiauth.degree.index',compact('degrees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.multiauth.degree.create');
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
        ]);

       $degree = new degree();
       
       
       $degree->short_title = $request->short_title;
       $degree->full_title = $request->full_title;

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
        return view('vendor.multiauth.degree.edit',compact('degree'));
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
        ]);

       $degree = Degree::find($id);   
       
       $degree->short_title = $request->short_title;
       $degree->full_title = $request->full_title;

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
