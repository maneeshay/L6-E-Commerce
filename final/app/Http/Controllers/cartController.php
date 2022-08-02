<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;

class cartController extends Controller
{
    public function cart(){
        $carts=cart::latest()->paginate(7);
        return view('cart',compact('carts'));
    }

    public function delete($id){
        cart::find($id)->delete();
        return redirect()->route('cart')->with('success', 'Product deleted successfully');
    }
}
