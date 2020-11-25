<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Orientation; 
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrientationController extends Controller
{
    /**
     * 
     */

    public function __construct(){
        $this->middleware('auth:api');
    }
     
    public function addAnswersOrientation(Request $request)
    {
        $request->validate([
            'year' => 'required|integer',
            'month' => 'required|string',
            'weekDay' => 'required|string',
            'monthDay' => 'required|integer',
            'user_years' => 'required|integer'
        ]);

        Orientation::create([
            'user_id' => Auth::user()->id, //pilla el usuario de la sesión
            'year' => $request->year,
            'month' => $request->month,
            'weekDay' => $request->weekDay,
            'monthDay' => $request->monthDay,
            'user_years' => $request->user_years
        ]);

        return response()->json([
            'message' => 'Successfully evaluation filled!'
        ], 201);
    }

}
