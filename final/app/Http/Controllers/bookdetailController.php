<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use Illuminate\Support\Facades\Auth;


class bookdetailController extends Controller
{
    public function bookdetail(Request $request){
        $search=$request['search'] ?? "";
        if($search!=""){
            $books=book::where('book_name', 'LIKE', "%$search%")->get();
        }else{
            $books=book::latest()->paginate(6);
        }
        return view('bookdetail',compact('books','search'));
}

    // public function addcart(Request $request,$id){
    //     if(Auth::id()){
    //         return redirect()->back();
    //     }else{
    //         return redirect('login');
    //     }
    // }
    function addtocart(Request $request){
            
        // if($request->session()->has('user')){
        //   return redirect('/');
        // }else{
        //   return redirect('/login');
        // }
        $cart = new Cart;
        $cart->book_id=$request->book_id;
        $cart->book_image=$request->book_image;
        $cart->book_name=$request->book_name;
        $cart->book_price=$request->book_price;
        $cart->save();
        return redirect('/cart');

      }

    public function cart(){
        $carts=cart::latest()->paginate(6);
        return view('cart',compact('carts'));
    }

   
}
