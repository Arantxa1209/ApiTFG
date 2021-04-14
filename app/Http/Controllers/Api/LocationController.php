<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Log;
use App\Models\Location;
use App\Models\Demographics; 
use Carbon\Carbon;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * 
     */
    public function addAnswersLocationTest(Request $request)
    {
        //dd($request);
        Log::error($request->slide_1);
        $request->validate([
            'slide_1' => 'required|boolean',
            'slide_2' => 'required|boolean',
            'slide_3' => 'required|boolean',
            'slide_4' => 'required|boolean',
            'slide_5' => 'required|boolean',
            'slide_6' => 'required|boolean',
            'slide_7' => 'required|boolean',
            'slide_8' => 'required|boolean',
            'slide_9' => 'required|boolean',
            'slide_10' => 'required|boolean'
            //'success' => 'required|integer',
            //'fails' => 'required|string',
            //'points' => 'required|integer'
        ]);
        
        $fails = 0;
        $success = 0;

        foreach($request->request as $value){
            if($value === true)
                $success++;
            else
                $fails++;
        }

        Location::create([
            'user_id' => Auth::user()->id, //pilla el usuario de la sesión
            'slide_1' => $request->slide_1,
            'slide_2' => $request->slide_2,
            'slide_3' => $request->slide_3,
            'slide_4' => $request->slide_4,
            'slide_5' => $request->slide_5,
            'slide_6' => $request->slide_6,
            'slide_7' => $request->slide_7,
            'slide_8' => $request->slide_8,
            'slide_9' => $request->slide_9,
            'slide_10' => $request->slide_10,            
            'success' => $success,
            'fails' => $fails,
            'points' => $success
        ]);

        return response()->json([
            'message' => 'Successfully test location filled!'
        ], 201);
    }

}
