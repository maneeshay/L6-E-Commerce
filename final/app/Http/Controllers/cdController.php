<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cd;
use Illuminate\Support\Carbon;

class cdController extends Controller
{
    public function cdIndex(){
        $cds=cd::latest()->paginate(5);
        return view('admin.cd',compact('cds'));
    }

    public function storeCd(Request $request){
        $request->validate([
            'cd_name'=>'required|unique:cds|min:4',
            'cd_image'=>'required|mimes:jpg,jpeg,png,jfif',
        ]);
      // insert brand image
      $cd_image=$request->file('cd_image'); //field name
      $name_gen=hexdec(uniqid()); //unique id
      $img_ext=strtolower($cd_image->getClientOriginalExtension());
      $img_name=$name_gen.'.'.$img_ext;
      //upload in folder
      $up_location='image/cd/';
      $last_img=$up_location.$img_name;
      $cd_image->move($up_location,$img_name);
  
      //insert Data
      cd::insert([
          'cd_name'=>$request->cd_name,
          'cd_image'=>$last_img,
          'cd_price'=>$request->cd_price,
          'cd_description'=>$request->cd_description,
          'cd_category'=>$request->cd_category,
          'created_at'=>Carbon::now()
      ]);
      return redirect()->route('store.cd')->with('success', 'CD added successfully');
  
      }
    public function edit($id){
        $cds=cd::find($id);
        return view('admin.edit_cd',compact('cds')); 
    }

    public function update(Request $request,$id){
        $request->validate([
          'cd_name'=>'required|min:4',
        ]);
        cd::find($id)->update([
            'cd_name'=>$request->cd_name,
            'cd_price'=>$request->cd_price,
            'cd_description'=>$request->cd_description,
            'cd_category'=>$request->cd_category,
            'created_at'=>Carbon::now()
        ]);
        return redirect()->route('cd.index')->with('success', 'CD updated successfully');  
    }

    public function delete($id){
        cd::find($id)->delete();
        return redirect()->route('cd.index')->with('success', 'CD deleted successfully');
    }
  

}
