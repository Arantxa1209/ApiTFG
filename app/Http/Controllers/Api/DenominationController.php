<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Denomination;
use App\Models\Demographics; 
use Carbon\Carbon;
use Illuminate\Http\Request;

class DenoninationController extends Controller
{
    /**
     * 
     */
    public function addAnswersDenominationTest(Request $request)
    {
        $request->validate([
            'word_1' => 'required|boolean',
            'word_2' => 'required|boolean',
            'word_3' => 'required|boolean',
            'word_4' => 'required|boolean',
            'word_5' => 'required|boolean',
            'word_6' => 'required|boolean',
            'word_7' => 'required|boolean',
            'word_8' => 'required|boolean',
            'word_9' => 'required|boolean',
            'word_10' => 'required|boolean',
            'word_11' => 'required|boolean',
            'word_12' => 'required|boolean',
            'word_13' => 'required|boolean',
            'word_14' => 'required|boolean',
            'word_15' => 'required|boolean',
            'word_16' => 'required|boolean',
            'word_17' => 'required|boolean',
            'word_18' => 'required|boolean',
            'word_19' => 'required|boolean',
            'word_20' => 'required|boolean'
            //'fails' => 'required|integer',
            //'points' => 'required|integer'
        ]);

        $fails = 0;
        $points = 0;

        foreach($request->request as $value){
            $lev = levenshtein($value, $word);
            if($lev === 2)
                $points++;
            else
                $fails++;
        }

        Denomination::create([
            'user_id' => Auth::user()->id, //pilla el usuario de la sesión
            'word_1' => $request->word_1,
            'word_2' => $request->word_2,
            'word_3' => $request->word_3,
            'word_4' => $request->word_4,
            'word_5' => $request->word_5,
            'word_6' => $request->word_6,
            'word_7' => $request->word_7,
            'word_8' => $request->word_8,
            'word_9' => $request->word_9,
            'word_10' => $request->word_10, 
            'word_11' => $request->word_11,
            'word_12' => $request->word_12,
            'word_13' => $request->word_13,
            'word_14' => $request->word_14,
            'word_15' => $request->word_15,
            'word_16' => $request->word_16,
            'word_17' => $request->word_17,
            'word_18' => $request->word_18,
            'word_19' => $request->word_19,
            'word_20' => $request->word_20, 
            'fails' => $fails,
            'points' => $points
        ]);

        return response()->json([
            'message' => 'Successfully test denomination filled!'
        ], 201);
    }

}
