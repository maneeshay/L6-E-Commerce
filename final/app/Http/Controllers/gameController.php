<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\game;
use Illuminate\Support\Carbon;

class gameController extends Controller
{
    public function gameIndex(){
        $games=game::latest()->paginate(5);
        return view('admin.game',compact('games'));
    }

    public function storeGame(Request $request){
        $request->validate([
            'game_name'=>'required|unique:games|min:4',
            'game_image'=>'required|mimes:jpg,jpeg,png,jfif',
        ]);
      // insert brand image
      $game_image=$request->file('game_image'); //field name
      $name_gen=hexdec(uniqid()); //unique id
      $img_ext=strtolower($game_image->getClientOriginalExtension());
      $img_name=$name_gen.'.'.$img_ext;
      //upload in folder
      $up_location='image/game/';
      $last_img=$up_location.$img_name;
      $game_image->move($up_location,$img_name);
  
      //insert Data
      game::insert([
          'game_name'=>$request->game_name,
          'game_image'=>$last_img,
          'game_price'=>$request->game_price,
          'game_description'=>$request->game_description,
          'game_category'=>$request->game_category,
          'created_at'=>Carbon::now()
      ]);
      return redirect()->route('store.game')->with('success', 'Game added successfully');
  
      }
    public function edit($id){
        $games=game::find($id);
        return view('admin.edit_game',compact('games')); 
    }

    public function update(Request $request,$id){
        $request->validate([
          'game_name'=>'required|min:4',
        ]);
        game::find($id)->update([
            'game_name'=>$request->game_name,
            'game_price'=>$request->game_price,
            'game_description'=>$request->game_description,
            'game_category'=>$request->game_category,
            'created_at'=>Carbon::now()
        ]);
        return redirect()->route('game.index')->with('success', 'Game updated successfully');  
    }

    public function delete($id){
        game::find($id)->delete();
        return redirect()->route('game.index')->with('success', 'Game deleted successfully');
    }
  

}
