<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Demographics; 
use Carbon\Carbon;
use Illuminate\Http\Request;

class DemographicsController extends Controller
{
    /**
     * 
     */
    public function addAnswers(Request $request)
    {
        $request->validate([
            'birthYear' => 'required|integer',
            'gender' => 'required|string',
            'studiesYear' => 'required|integer'
        ]);

        Demographics::create([
            'user_id' => Auth::user()->id, //pilla el usuario de la sesión
            'birthYear' => $request->birthYear,
            'gender' => $request->gender,
            'studiesYear' => $request->studiesYear
        ]);

        return response()->json([
            'message' => 'Successfully evaluation filled!'
        ], 201);
    }

}
