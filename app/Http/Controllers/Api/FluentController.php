<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Log;
use App\Models\Fluent; 
use Carbon\Carbon;
use Illuminate\Http\Request;


class FluentController extends Controller
{
    /**
     * 
     */
    public function addAnswersFluentTable(Request $request)
    {
        $request->validate([
            'unique_designs' => 'integer',
            'repetitions' => 'integer',
            'total_answers' => 'integer',
            'percentage' => 'double'
        ]);

        $total = $request->request->count();
        $uniques = 0;
        $rep = 0;
        $map = array(); 
        //  ORIGINAL:[D1: [A, B, C], D2: [A, B, C], D3: [G, H, I]]
        //  MAP: [[A, B, C], [G, H, I]]
        
        foreach($request->request as $value){
            //Log::info('VALUE: ');
            //Log::info($value);
            //Log::info('MAPA: ');
            //Log::info($map);
            if(in_array($value , $map)){
                $rep++;
            }
            else{
                array_push($map, $value);
            }
        }
        
        //Log::info('---------');
        //Log::info('MAPA FINAL: ');
        //Log::info($map);

        $uniques = count($map);
        $percentage = ($uniques / $total) * 100; 

        Fluent::create([
            'user_id' => Auth::user()->id, //pilla el usuario de la sesión
            'unique_designs' => $uniques,
            'repetitions' => $rep,
            'total_answers' => $total,
            'percentage' =>  $percentage            
        ]);

        return response()->json([
            'message' => 'Successfully fluent table filled!'
        ], 201);
    }
}
