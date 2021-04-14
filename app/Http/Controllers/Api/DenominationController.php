<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Log;
use App\Models\Denomination;
use App\Models\Demographics; 
use Carbon\Carbon;
use Illuminate\Http\Request;


class DenominationController extends Controller
{
    /**
     * 
     */
    public function addAnswersDenominationTest(Request $request)
    {
        $request->validate([
            'word_1' => 'string|nullable',
            'word_2' => 'string|nullable',
            'word_3' => 'string|nullable',
            'word_4' => 'string|nullable',
            'word_5' => 'string|nullable',
            'word_6' => 'string|nullable',
            'word_7' => 'string|nullable',
            'word_8' => 'string|nullable',
            'word_9' => 'string|nullable',
            'word_10' => 'string|nullable',
            'word_11' => 'string|nullable',
            'word_12' => 'string|nullable',
            'word_13' => 'string|nullable',
            'word_14' => 'string|nullable',
            'word_15' => 'string|nullable',
            'word_16' => 'string|nullable',
            'word_17' => 'string|nullable',
            'word_18' => 'string|nullable',
            'word_19' => 'string|nullable',
            'word_20' => 'string|nullable'
            //'fails' => 'required|integer',
            //'points' => 'required|integer'
        ]);

        $fails = 0;
        $points = 0;
        $i = 0;
        $words = array('HUEVO', 'JAMÓN', 'KIWI', 'TOMATE', 'UVAS', 'PLÁTANO', 'SANDÍA', 'MANTEQUILLA', 'BROCOLI', 'ACEITE', 'ZANAHORIA', 'CHOCOLATE', 'GUISANTE', 'FRESA', 'ZUMO', 'MANZANA', 'CEREALES', 'QUESO', 'PERA', 'MIEL');
        $distances = array("2", "2", "1", "2", "1", "2", "2", "3", "2", "2", "3", "3", "3", "2", "1", "2", "2", "2", "1", "1");

        foreach($request->request as $value){
            $lev = levenshtein($value, $words[$i]);
            Log::info($lev);
            Log::info($value);
            Log::info($words[$i]);

            if($lev <= $distances[$i])
                $points++;
            else
                $fails++;
            $i++;
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
