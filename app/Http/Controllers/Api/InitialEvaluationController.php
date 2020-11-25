<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\InitialEvaluation; 
use Carbon\Carbon;
use Illuminate\Http\Request;

class InitialEvaluationController extends Controller
{
    /**
     * 
     */

    public function __construct(){
        $this->middleware('auth:api');
    }

    public function addQuestions(Request $request)
    {
        $request->validate([
            'question_1' => 'required|boolean',
            'question_2' => 'required|boolean',
            'question_3' => 'required|boolean',
            'question_4' => 'required|boolean',
            'question_5' => 'required|boolean',
            'question_6' => 'required|boolean',
            'question_7' => 'required|boolean',
            'question_8' => 'required|boolean',
            'question_9' => 'required|boolean',
            'question_10' => 'required|boolean'
        ]);

        InitialEvaluation::create([
            'user_id' => Auth::user()->id, //pilla el usuario de la sesión
            'question_1' => $request->question_1,
            'question_2' => $request->question_2,
            'question_3' => $request->question_3,
            'question_4' => $request->question_4,
            'question_5' => $request->question_5,
            'question_6' => $request->question_6,
            'question_7' => $request->question_7,
            'question_8' => $request->question_8,
            'question_9' => $request->question_9,
            'question_10' => $request->question_10
        ]);

        return response()->json([
            'message' => 'Successfully evaluation filled!'
        ], 201);
    }

}
