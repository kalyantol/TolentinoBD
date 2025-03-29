<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

        $user = Auth::user();
        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current Password is not matched');
        }
        // Check if the new password is the same as the current password
        // This check is optional, but it can help prevent users from accidentally setting the same password
        // You can uncomment the following lines if you want to enforce this rule
        if ($request->current_password == $request->password) {
            return redirect()->back()->with('error', 'New Password cannot be same as Current Password');
        }
        $user->password = Hash::make($request->password);
        $user->save();
        // Optionally, you can log the user out after changing the password
        // Auth::logout();
        // return redirect()->route('login')->with('success', 'Password Changed Successfully');
        // Or you can redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Password Changed Successfully');
    }
}
