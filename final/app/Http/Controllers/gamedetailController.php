<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\game;

class gamedetailController extends Controller
{
    public function gamedetail(Request $request){
            $search=$request['search'] ?? "";
            if($search!=""){
                $games=game::where('game_name', 'LIKE', "%$search%")->get();
            }else{
                $games=game::latest()->paginate(6);
            }
            return view('gamedetail',compact('games','search'));
        
    }
}
