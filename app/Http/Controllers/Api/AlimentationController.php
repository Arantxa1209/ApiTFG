<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Log;
use App\Models\Alimentation; 
use Carbon\Carbon;
use Illuminate\Http\Request;


class AlimentationController extends Controller
{
    /**
     * 
     */
    public function addAnswersAlimentationTable(Request $request)
    {
        $request->validate([
            'word_1' => 'string|nullable',
            'word_2' => 'string|nullable',
            'word_3' => 'string|nullable'
        ]);

        $fails = 0;
        $points = 0;        
        $words = array('FIDEOS', 'AZUCAR', 'LEVADURA');
        $distances = array("2", "2", "2");
        
        foreach($request->request as $value){
            $aux = 0;
            $i = 0;
            $encontrado = false;
            while($i < 3 && !$encontrado){
                $value = strtoupper($value);
                $lev = levenshtein($value, $words[$i]);
                if($i == 0)
                    $aux = $lev;
                if($aux == 0)  {
                    $encontrado = true;                     
                }                   
                else if($aux >= $lev){
                    $aux = $lev;
                }                
                $i++;
            }  

            if($encontrado || $aux <= 2){
                array_pop($distances);
                $points++;
            }
            else if($aux > 2){
                $fails++;
            }
        }         

        Alimentation::create([
            'user_id' => Auth::user()->id, //pilla el usuario de la sesión
            'word_1' => $request->word_1,
            'word_2' => $request->word_2,
            'word_3' => $request->word_3,
            'fails' => $fails,
            'points' => $points
        ]);

        return response()->json([
            'message' => 'Successfully alimentation table filled!'
        ], 201);
    }
}
