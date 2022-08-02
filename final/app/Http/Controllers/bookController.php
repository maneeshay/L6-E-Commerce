<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use Illuminate\Support\Carbon;
use App\Models\cart;

class bookController extends Controller
{
    public function dashboard(){
        $books=book::latest()->paginate(5);
        return view('admin.index',compact('books'));
    }


    public function storeBook(Request $request){
        $request->validate([
            'book_name'=>'required|unique:books|min:4',
            'book_image'=>'required|mimes:jpg,jpeg,png,jfif',
        ]);
      // insert brand image
      $book_image=$request->file('book_image'); //field name
      $name_gen=hexdec(uniqid()); //unique id
      $img_ext=strtolower($book_image->getClientOriginalExtension());
      $img_name=$name_gen.'.'.$img_ext;
      //upload in folder
      $up_location='image/book/';
      $last_img=$up_location.$img_name;
      $book_image->move($up_location,$img_name);
  
      //insert Data
      book::insert([
          'book_name'=>$request->book_name,
          'book_image'=>$last_img,
          'book_price'=>$request->book_price,
          'book_description'=>$request->book_description,
          'book_category'=>$request->book_category,
          'created_at'=>Carbon::now()
      ]);
  
      return redirect()->route('admin_dashboard')->with('success', 'Book added successfully');
  
      }
      public function edit($id){
        $books=book::find($id);
        return view('admin.edit_book',compact('books'));
        
    }

        public function update(Request $request,$id){
          $request->validate([
            'book_name'=>'required|min:4',
          ]);
          book::find($id)->update([
              'book_name'=>$request->book_name,
              'book_price'=>$request->book_price,
              'book_description'=>$request->book_description,
              'book_category'=>$request->book_category,
              'created_at'=>Carbon::now()
          ]);
          return redirect()->route('admin_dashboard')->with('success', 'Book updated successfully');  
        }
          
          public function delete($id){
              book::find($id)->delete();
              return redirect()->route('admin_dashboard')->with('success', 'Book deleted successfully');
          }
        
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


   

}
