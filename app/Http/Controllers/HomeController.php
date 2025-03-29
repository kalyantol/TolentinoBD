<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function profile()
    {
        return view('layouts.profile');
    }

    public function viewprofile($id){

         $id = Crypt::decryptString($id);
         echo $id;

    }
    public function changepassword(){

         return view('changepassword');

    }
    public function changepasswordpage(Request $request){

       
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min: 6|max: 14|confirmed',
            'password_confirmation' => 'required',
        ]);

        echo $request->input('password');

        // return redirect()->back()->with('success', 'Password Change Successfully');

    }
}
