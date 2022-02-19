<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\States;
class StateController extends Controller
{
    //
    public function index(){
        
    }

    public function store(Request $request){
        
    }

    public function show(){
        $states = States::all();
        return response()->json([
            'message' => $states,
         ]);
    }

    public function update(Request $request){

    }
    public function destroy($id){

    }
}
