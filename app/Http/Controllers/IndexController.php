<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    // let's initialize our controller
    public function __construct()
    {
        $this->middleware('guest');
    }

    // home page action
    public function index()
    {
        return view('index.home');
    }

    // user registration action
    public function register()
    {
        return view('index.register');
    }

    // process registration
    public function storeuser(Request $request)
    {        
        // validate user input;
        $this->validate($request, [
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password'=> 'required|confirmed'
         ]);

         // Let's create our user for storage in the database
         User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
         ]);

         // let's log our new user in and redirect them them to the sendmail page
         auth()->attempt($request->only('email', 'password'));
         return redirect()->route('sendmail');
    }

    // login page action
    public function login()
    {
        return view('index.login');
    }

    // do login action
    public function dologin(Request $request)
    {     
        // validate user input;
        $this->validate($request, [
            'email' => 'required|email',
            'password'=> 'required',
        ]);

        // checking to see if login is successful
        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('status', 'Invalid Login Details');
        }

        // login suuccessful. time to redirect.
        return redirect()->route('sendmail');
    }
}
