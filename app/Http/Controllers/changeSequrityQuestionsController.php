<?php

namespace App\Http\Controllers;

use App\Models\security_question_answers;
use App\Models\security_questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class changeSequrityQuestionsController extends Controller
{
    public function index()
    {
        # code...
    }


    public function checkPass(Request $request)
    {
         # code...
         $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation fails',
                'errors' => $validator->errors()
            ], 422);
          }  

                $user = $request->user();
                if (Hash::check($request->password,$user->password)) {
                    
                    return redirect('change-security-questions');

                }else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Wrong Password! Kindly try again.',
                        ], 422);
                }
        }


    public function change_security(Request $request)
             {
                $change = $request->input(); 
                $validator = Validator::make($request->all(), [
                    'answer1' => 'required',
                    'answer2' => 'required',
                    'answer3' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Validation fails',
                        'errors' => $validator->errors()
                    ], 422);
                }
                else {
                    $user = Auth()->user();
                    // $user = $request->user();
                $question = security_question_answers::where('user_id', '=', $user->id);
                   
                    $question->update([
                        'answer_1'=> $change['answer1'],
                        'answer_2'=> $change['answer2'],
                        'answer_3'=> $change['answer3'],
                    ]);

                    return response()->json([
                        'success' => true,
                        'message' => 'Security questions are successfully changed'  
                    ], 200);
                    
                }
             }
}
