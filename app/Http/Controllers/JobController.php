<?php

namespace App\Http\Controllers;

use App\Models\jobs;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function store(Request $request)
    {
        // $user = auth()->user();
        $jobData= $request->input();
        $jobval=validator($request->all(),[
            'job_email'=>['required', 'string', 'email', 'max:255', 'unique:jobs'],
            'job_company'=>'required|max:191',
            'job_position'=>'required|max:191',
            'job_description'=>'required',
            'job_location'=>'required|max:191',
            'state'=>'required|max:191',
            'job_category'=>'required|max:191',
            'job_duration'=>'nullable',
            'job_type'=>'nullable',
        ]);

        if($jobval->fails()){
            return response()->json([
                'message' => $jobval->errors()
             ]);
        }
       else {

        $job_post = jobs::create([
            'job_email'=>        $jobData['job_email'],
            'job_company'=>      $jobData['job_company'],
            'job_position'=>     $jobData['job_position'],
            'job_description'=>  $jobData['job_description'],
            'job_location'=>     $jobData['job_location'],
            'state'=>            $jobData['state'],
            'job_category'=>     $jobData['job_category'],
            'job_duration'=>     $jobData['job_duration'],
            'job_type'=>         $jobData['job_type'],
        ]);
        return response()->json([
            "success" => true,
            "message" => "successful",
            "data" => $job_post
        ]);
       }
    }

    public function show_location($name)
    {
        $job_location = jobs::where("job_location","like", "%". $name . "%")->get("job_location");
            if(count($job_location)){
                return $job_location;
            }
            else {
                return response()->json([
                    'succcess' => false,
                    'message' => 'Search Error',
                    'error' => 'We could not find anything related to '."'".$name."'".', Kindly try again.'
                ], 422);
            }
    }
    public function show_industry($name)
    {
        $job_category = jobs::where("job_category","like", "%". $name . "%")->get("job_category");
            if(count($job_category)){
                return $job_category;
            }
            else {
                // return array('Error:', 'No records found');
                return response()->json([
                    'succcess' => false,
                    'message' => 'Search Error',
                    'error' => 'We could not find anything related to '."'".$name."'".', Kindly try again.'
                ], 422);
            }
    }
    public function show_duration($name)
    {
        return
        $job_duration = jobs::where("job_duration","like", "%". $name . "%")->get("job_duration");
            if(count($job_duration)){
                return $job_duration;
            }
            else {
                return response()->json([
                    'succcess' => false,
                    'message' => 'Search Error',
                    'error' => 'We could not find anything related to '."'".$name."'".', Kindly try again.'
                ], 422);
            }
    }
}
