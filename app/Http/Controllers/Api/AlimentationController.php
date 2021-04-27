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

        $points = 0;      
        $total = 3;  
        $words = array('FIDEOS', 'AZUCAR', 'LEVADURA');
        $distances = array("2", "2", "2");

        foreach($request->request as $value){
            $aux = 0;
            for($i = 0; $i < 3; $i++){
                $value = strtoupper($value);
                similar_text($value, $words[$i], $percent);
                if($i == 0){
                    $aux = $percent;
                }                                    
                else if($aux <= $percent){
                    $aux = $percent;
                }         
                //Log::info('PALABRA: ');
                //Log::info($value);
                //Log::info('WORD: ');
                //Log::info($words[$i]);
               
            }
            //Log::info('PERCENT: ');
            //Log::info($percent);

            if($aux >= 75.0){
                $points++;
            }

            //Log::info('PUNTOS: ');
            //Log::info($points);
            //Log::info('FALLOS: ');
            //Log::info($fails);
            //Log::info('-----------');
        }

        /*
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
        */   

        Alimentation::create([
            'user_id' => Auth::user()->id, //pilla el usuario de la sesión
            'word_1' => $request->word_1,
            'word_2' => $request->word_2,
            'word_3' => $request->word_3,
            'fails' => ($total - $points),
            'points' => $points
        ]);

        return response()->json([
            'message' => 'Successfully alimentation table filled!'
        ], 201);
    }
}
