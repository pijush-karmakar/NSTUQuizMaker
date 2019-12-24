<?php

namespace App\Http\Controllers;

Use App\Degree;
Use App\Batch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::oldest()->get();
        $degrees = Degree::all();
        return view('vendor.multiauth.admin.batch.index',compact('batches','degrees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $degrees = Degree::all();
         return view('vendor.multiauth.admin.batch.create',compact('degrees'));
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
            'degree' => 'required',
            'session' => 'required',
            'session_start' => 'required',
            'batch_name' => 'required',
            'number_of_terms' => 'required',
            'terms_per_year' => 'required',
        ]);

       $batch = new Batch();
       
       $batch->degree_id = $request->degree;
       $batch->session = $request->session;
       $batch->session_start = $request->session_start;
       $batch->batch_name = $request->batch_name;
       $batch->number_of_terms = $request->number_of_terms;
       $batch->terms_per_year = $request->terms_per_year;

       $batch->save();
       
       return redirect(route('batch.index'))->with('message', 'New batch is stored successfully');
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
        $batch = Batch::find($id);
        $degrees = Degree::all();
        return view('vendor.multiauth.admin.batch.edit',compact('batch','degrees'));
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
            'degree' => 'required',
            'session' => 'required',
            'session_start' => 'required',
            'batch_name' => 'required',
            'number_of_terms' => 'required',
            'terms_per_year' => 'required',
        ]);

       $batch = Batch::find($id);
       
       $batch->degree_id = $request->degree;
       $batch->session = $request->session;
       $batch->session_start = $request->session_start;
       $batch->batch_name = $request->batch_name;
       $batch->number_of_terms = $request->number_of_terms;
       $batch->terms_per_year = $request->terms_per_year;

       $batch->save();
       
       return redirect(route('batch.index'))->with('message', 'Batch is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $batch = Batch::find($id);
         $batch->delete();
         return redirect(route('batch.index'))->with('message', ' Batch deleted successfully');
    }







}
