<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Models\cd;
use App\Models\game;

class shopDetailController extends Controller
{
    public function bookDetail($id){
        $books=book::find($id);
        return view('bookdetail',compact('books'));
    }
}
