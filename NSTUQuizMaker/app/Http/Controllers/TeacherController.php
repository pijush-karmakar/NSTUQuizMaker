<?php

// namespace Bitfumes\Multiauth\Http\Controllers;
namespace App\Http\Controllers;

Use App\Department;
use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    public function index()
    {
       $teachers = teacher::latest()->get();
       $departments = Department::all();

       return view('vendor.multiauth.admin.teachers',compact('teachers','departments'));
    }

    public function destroy($id)
    {
        $teachers = teacher::findOrFail($id)->delete();
        return redirect(route('teacher.index'))->with('message', "You have deleted teacher successfully");
    }
}
