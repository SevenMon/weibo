<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request){
        $this->validate($request,array(
            'content' => 'required|max:140'
        ));

        Auth::user()->statuses->create([
            'content' => $request->content
        ]);

    }

    public function destroy(Status $status){

    }
}
