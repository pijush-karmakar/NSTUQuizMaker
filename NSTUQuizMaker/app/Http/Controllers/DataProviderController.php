<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;
use Redirect,Response;

use App\Math;
use App\Form;

use App\Degree;
use App\Department;
use App\Batch;
use App\Student;


class DataProviderController extends Controller
{
    public function getDegreeSessions(Request $request)
{
    $sessions = array();

    if ($request->degree) {        
        $batches = Batch::where('degree_id', $request->degree)->get();
        foreach ($batches as $batch) {            
            $sessions[] = array('session' => $batch->session, 'batch_id' => $batch->id);
        }
    }

    return response()->json(['sessions' => $sessions]);
}
}
