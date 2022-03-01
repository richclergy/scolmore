<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ScolmoreMailer;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    // let's initialize our controller
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Default action/page to send email
    public function index()
    {
        return view('index');
    }

    // Default action/page to send email
    public function sendmail()
    {
        return view('mail.sendmail');
    }

    // This action actually sends and store the email in a database
    #public function storemail(Request $request)
    #{
        #//return view('sendmail');
        #$this->validate($request, [
            #'fullname' => 'required',
            #'receipient' => 'required|email',
            #'message' => 'required|max:140'
         #]);
    #}

    public function storemail(Request $request)
    {
        /** 
         * Store a receiver email address to a variable.
         */
        $reveiverEmailAddress = $request->receipient;

        /**
         * Import the Mail class at the top of this page,
         * and call the to() method for passing the 
         * receiver email address.
         * 
         * Also, call the send() method to incloude the
         * HelloEmail class that contains the email template.
         */
        Mail::to($reveiverEmailAddress)->send(new ScolmoreMailer);

        /**
         * Check if the email has been sent successfully, or not.
         * Return the appropriate message.
         */
        if (Mail::failures() != 0) {
            return back()->with('status', 'Email has been sent successfully');
        }
        return back()->with('status', "Oops! There was some error sending the email.");
    }
}
