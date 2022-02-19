<?php

namespace App\Http\Controllers;

use App\Models\security_question_answers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class changePasswordController extends Controller
{
    public function check_oldPass(Request $request)
    {
        # code...
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation fails',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $request->user();
        # Check if password and Seurity answer exists
        if (Hash::check($request->old_password,$user->password)) {
            return response()->json([
                'success' => true,
                'message' => 'Correct!'
            ], 200);
             // return redirect('enter-security-ans');
         }

        else {
            return response()->json([
                'success' => false,
                'message' => 'The Password you provided do not match the old one!',
            ], 422);
        }
    }


    //Check security question answers and change password
    public function enter_security_ans(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'answer1' => 'required',
            'answer2' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed!',
                'errors' => $validator->errors(),
                'data' => []
            ], 422);
        }

        $sec_questions = Security_question_answers::where('answer', '=', $request->input('answer1'), 'and', 'answer', '=', $request->input('answer2'))->first();
        if ($sec_questions == null) {
            return response()->json([
                'success' => false,
                'message' => 'The Answers you provided are incorrect. Kindly try again!'
            ], 400);
         }
        else {
            return response()->json([
                'message' => 'Almost Done!!'
            ]);
            // return redirect('change-password');
        }
    }


    // Enter new password to change password
    public function newPass(Request $request)
    {
         # code...
         $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:8|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation fails',
                'errors' => $validator->errors()
            ], 422);
        }

        else {
            $user = $request->user();
            $user->update([
                'password'=>Hash::make($request->new_password)
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Password successfully changed'
            ], 400);
         }
    }


}
