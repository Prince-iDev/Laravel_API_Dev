<?php

namespace App\Http\Controllers;

use App\Models\BusinessProfileSetups;
use Illuminate\Http\Request;

class BusinessProfileController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();
        $bizData= $request->input();
        $validationBiz=validator($request->all(), [
            // set up biz
            'user_id'=>['required', 'unique:business_profile_setup'],
            'biz_type'=>'required|max:191',
            'biz_name'=>'required|max:191',
            'biz_related_to'=>'required|max:191',
            'biz_description'=>'required|max:191',
            'biz_email'=>['required', 'string', 'email', 'max:255', 'unique:business_profile_setup'],
            'biz_phone_number'=>'required|max:191',
            'biz_website_add'=> 'required|max:191',
            'biz_location_add'=> 'required|max:191',
            'biz_reg_number'=> 'required|max:191',
            'biz_tax_id_number'=>'required|max:191',
            'biz_CAC_name'=>'required|mimes:docx,doc,pdf|max:2048',
            'biz_logo_name'=>'required|mimes:png,jpg,jpeg|max:3000',
        ]);

        if ($validationBiz->fails()) {
                return response()->json([
                    'succcess' => false,
                    'message' => 'Validation Error',
                    'error' => $validationBiz->errors()
                ], 422);
        } 
                  
        else {
        $biz_check = BusinessProfileSetups::where('user_id', $user->id)->count();
        if($biz_check > 0){
            return response()->json([
                'status' => true,
                'message' => "Business Profile Already Exist"
            ], 200);
        }else{
            $biz_CAC_name = $request->file('biz_CAC_name');
            $biz_logo_name = $request->file('biz_logo_name');
            $CACsize = $request->file('biz_CAC_name');
            $logoSize = $request->file('biz_logo_name');
            if($biz_CAC_name && $biz_logo_name->isValid()){
                $CACName = time().'.'.$biz_CAC_name->extension();
                $imagePath = public_path(). '/backendfiles/business_CAC';
        
                $biz_CAC_name->path = $imagePath;
                $biz_CAC_name->biz_CAC_name = $CACName;
                $CfileSize = $CACsize->getSize();

                $biz_CAC_name->move($imagePath, $CACName);
                


                // Logo Upload
                $logoName = time().'.'.$biz_logo_name->extension();
                $logoPath = public_path(). '/backendfiles/business_logo';
        
                $biz_logo_name->path = $logoPath;
                $biz_logo_name->biz_logo_name = $logoName;
                
                $LfileSize = $logoSize->getSize();


                $biz_logo_name->move($logoPath, $logoName);

                $business_profile = BusinessProfileSetups::create([
                    'user_id'=>$user->id,
                    'biz_type'=>       $bizData['biz_type'],
                    'biz_name'=>       $bizData['biz_name'],
                    'biz_related_to'=>       $bizData['biz_related_to'],
                    'biz_description'=>      $bizData['biz_description'],
                    'biz_email'=>           $bizData['biz_email'],
                    'biz_phone_number'=>    $bizData['biz_phone_number'],
                    'biz_website_add'=>    $bizData['biz_website_add'],
                    'biz_location_add'=>        $bizData['biz_location_add'],
                    'biz_location_lga'=>        $bizData['biz_location_lga'],
                    'biz_reg_number'=>        $bizData['biz_reg_number'],
                    'biz_tax_id_number'=>        $bizData['biz_tax_id_number'],
                    'biz_CAC_name'=>             $CACName,
                    'biz_CAC_size'=>           $CfileSize,
                    'biz_logo_name'=>           $logoName,
                    'biz_logo_size'=>           $LfileSize,
                ]);
                return response()->json([
                    "success" => true,
                    "message" => "successfully",
                    "data" => $business_profile
                ]);
            }
        }
    
    }
  }
}
