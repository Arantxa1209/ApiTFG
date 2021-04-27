<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Log;
use App\Models\Memory; 
use Carbon\Carbon;
use Illuminate\Http\Request;


class MemoryController extends Controller
{
    /**
     * 
     */
    public function addAnswersMemoryTable(Request $request)
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
            'word_9' => 'string|nullable'
        ]);

        $fails = 0;
        $points = 0;        
        $words = array('LAVAVAJILLAS', 'SERVILLETAS', 'ACONDICIONADOR', 'DETERGENTE', 'ESPONJA', 'GASAS', 'FIDEOS', 'AZUCAR', 'LEVADURA');
        $distances = array(4, 4, 4, 3, 2, 2, 2, 2, 2);
        

        foreach($request->request as $value){
            $aux = 0;
            for($i = 0; $i < 9; $i++){
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
            else{
                $fails++;
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
            while($i < 9 && !$encontrado){
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
                
                Log::info($value);
                Log::info($words[$i]);
                      
                $i++;
            }  
            Log::info('AUX: ');
            Log::info($aux);
          

            if($encontrado || ($aux <= max($distances))){
                if($encontrado){
                    unset($distances[$i]);
                }
                else if($aux < max($distances) && $aux > min($distances)){
                    unset($distances[$i]);
                }
                else if($aux <= min($distances)){
                    array_pop($distances);
                }
                else if($aux == max($distances)){
                    array_shift($distances);
                }
               
                $points++;
            }
            else if($aux > max($distances)){
                $fails++;
            }
            Log::info('PUNTOS: ');
            Log::info($points);
            Log::info('FALLOS: ');
            Log::info($fails);
            Log::info('-----------');
        } 
        */

        Memory::create([
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
            'fails' => $fails,
            'points' => $points
        ]);

        return response()->json([
            'message' => 'Successfully memory table filled!'
        ], 201);
    }
}
