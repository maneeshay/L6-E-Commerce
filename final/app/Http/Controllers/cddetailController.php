<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cd;

class cddetailController extends Controller
{
    public function cddetail(){
        $cds=cd::latest()->paginate(6);
        return view('cddetail',compact('cds'));
    }
}
