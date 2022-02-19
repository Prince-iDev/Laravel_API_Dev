<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessProfileController;
use App\Http\Controllers\changeSequrityQuestionsAnswersController;
use App\Http\Controllers\ResidentialProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LGAController;
use App\Http\Controllers\LocalgovernmentareaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\reportProblemController;
use App\Http\Controllers\SecurityQuestionController;
use App\Http\Controllers\StateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register', [RegisterController::class, 'register']);
 Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function (){
    Route::post('create-residential-profile', [ResidentialProfileController::class, 'store']);
    Route::post('business-profile-setup', [BusinessProfileController::class, 'store']);
    Route::get('states', [stateController::class, 'store']);
    Route::post('states-field', [StateController::class, 'show']);
    Route::get('localgovernmentarea/{id}/show', [LocalgovernmentareaController::class, 'show']);
    Route::post('lga-field', [LocalgovernmentareaController::class, 'store']);
    Route::post('job-upload', [JobController::class, 'store']);
    Route::get('search-job-location/{name}', [JobController::class, 'show_location']);
    Route::get('search-job-industry/{name}', [JobController::class, 'show_industry']);
    Route::get('search-job-duration/{name}', [JobController::class, 'show_duration']);

    //Change Password routes
    Route::post('check-oldpassword', [AuthController::class, 'check_oldPass']);
    Route::post('enter-security-ans', [AuthController::class, 'enter_security_ans']);
    Route::post('change-password', [AuthController::class, 'changePass']);

    //Change security question routes
    Route::post('check-password-security-questions', [changeSequrityQuestionsAnswersController::class, 'checkPass']);
    Route::post('change-security-questions', [changeSequrityQuestionsAnswersController::class, 'change_security']);


    Route::post('security-questions-answers', [SecurityQuestionController::class, 'uploadSecQuestions']);
    Route::post('report-problem', [reportProblemController::class, 'store']);
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
