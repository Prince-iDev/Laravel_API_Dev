<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residential_Profile;

class ResidentialProfileController extends Controller
{
        public function store(Request $request)
        {
            $user = auth()->user();
            $residentialData= $request->input();
            $residentialVal=validator($request->all(),[
                'user_id'=>['required', 'unique:residential_profile'],
                'home_address'=>'required|max:191',
                'lga_house_address'=>'required|max:191',
                'state_of_origin'=>'required|max:191',
                'lga_state_of_origin'=>'required|max:191',
            ]);
           
            if($residentialVal->fails()){
                 return response()->json([
                    'succcess' => false,
                    'message' => 'Validation Error',
                    'error' => $residentialVal->errors()
                ], 422);
            }
            
            $residential_check = Residential_Profile::where('user_id', $user->id)->count();
        if($residential_check > 0){
            return response()->json([
                'status' => true,
                'message' => "Residential Profile Already Exist"
            ], 200);
           }
           else {
            $residential_profile = Residential_Profile::create([
                'user_id'=>                  $user->id,
                'home_address'=>             $residentialData['home_address'],
                'lga_house_address'=>        $residentialData['lga_house_address'],
                'state_of_origin'=>          $residentialData['state_of_origin'],
                'lga_state_of_origin'=>      $residentialData['lga_state_of_origin'],
                
            ]);
            return response()->json([
                "success" => true,
                "message" => "successfully",
                "data" => $residential_profile
            ]);
           }

            
        }

    
}
