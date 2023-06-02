<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function showForm()
    {
        return view('emails.contact');
    }
    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $message = Message::create($validatedData);

        Mail::to('test1@mailinator.com')->send(new ContactMail($message));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
