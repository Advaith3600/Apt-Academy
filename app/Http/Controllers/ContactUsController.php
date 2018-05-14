<?php

namespace App\Http\Controllers;

use Mail;
use Session;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        Mail::to(config('mail.from.address'))->send(new ContactUsMail($request->all()));

        Session::flash('success', 'Your comment was successfully sent');
        return back();
    }
}
