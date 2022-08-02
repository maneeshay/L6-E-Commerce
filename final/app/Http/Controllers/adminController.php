<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class adminController extends Controller
{
    public function index(){
        return view('admin.admin_login');
    }

    // public function dashboard(){
    //     $books=book::latest()->paginate(7);
    //     return view('admin.index',compact('books'));
    // }

    public function login(Request $request){
        // dd($request->all());
        $check=$request->all();
        if(Auth::guard('admin')->attempt(['email'=>$check['email'], 'password'=>$check['password']]))
        {
            return redirect()->route('admin_dashboard')->with('alert','Admin login successfully');
        }
        else{
            return back()->with('alert','Invalid email or password');
        }
    }

    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('index')->with('alert','Admin logout successfully');
    }


    public function adminRegister(Request $request){
        admin::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('login_form')->with('alert','Admin account successfully');
    }
}
