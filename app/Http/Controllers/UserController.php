<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // let's initialize our controller
    public function __construct()
    {
        $this->middleware('auth');
    }

    // logout action
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('status', 'Logged Out Successfully');
    }

    // Page to view sent email logs and show status
    public function logs()
    {
        return view('user.view-logs');
    }
}
