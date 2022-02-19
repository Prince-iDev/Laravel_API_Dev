<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Localgovernmentarea;

class LocalgovernmentareaController extends Controller
{
    //
    public function index(){
     
  }

  public function store(Request $request){
      
  }

  public function show($state_id){
      $lga = localgovernmentarea::where('state_id', $state_id)->get('lga_name');
      return response()->json(['lga' => $lga], 200);
  }
  public function update(Request $request){

  }
  public function destroy($id){

  }

//   public function showlga(Request $request){
//       $validator = Validator::make($request->all(), [
//           'id'=>'required'
//       ]);
      
//       if ($validator->fails()) {
//           return response()->json([
//               'message' => $validator->errors()
//            ]);
//       }else{
//           $lga = localgovernmentarea::where('state_id', $request)->get();
//           return response()->json(['lga' => $lga], 200);
//       }
//   }
  
}