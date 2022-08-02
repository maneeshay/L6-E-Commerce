<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Models\cd;
use App\Models\game;
use Newsletter;

class welcomeController extends Controller
{
    public function index(){
        $books=book::latest()->paginate(4);
        $games=game::latest()->paginate(4);
        $cds=cd::latest()->paginate(4);
        return view('welcome',compact('books','games','cds'));
    }

    public function subscribe(Request $request){

    if ( ! Newsletter::isSubscribed($request->email) ) {
        Newsletter::subscribe($request->email);
        return redirect()->back()->with('success','Email  subscribed');
    }

        
    }
}
