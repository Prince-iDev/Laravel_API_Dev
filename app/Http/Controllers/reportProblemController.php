<?php

namespace App\Http\Controllers;

use App\Models\report_problems;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\Promise\all;

class reportProblemController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth()->user();
        $report = $request->input();
        $validate = Validator::make($request->all(),[
            'user_problems'=>'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation fails',
                'errors' => $validate->errors()
            ], 422);
        }
        else {
            $reportProblem = report_problems::create([
                'user_id' => $user->id,
                'user_problems' => $report['user_problems']
            ]);
            
            $name = User::where('id', '=', $user->id)->get('name');
            return response()->json([
                'success' => true,
                'message' => 'Hello '. $name .' your report has been sent!',
                'data' => $reportProblem
            ]);
        }
    }
}
