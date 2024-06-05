<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscription;
use App\Mail\ContactMail;

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

    public function send(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'contactno' => 'required',
            'message' => 'required',
        ]);

        // Send email
        Mail::to('FesEnginesRentel@gmail.com')->send(new ContactMail($request));
        return redirect()->route('contactsent')->with('success', 'Your message has been sent successfully!');
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'subscriberemail' => 'required|email',
        ]);

        // Send the email
        Mail::to($request->subscriberemail)->send(new NewsletterSubscription());
        // Redirect back or return a response
        return redirect()->route('subscribesent')->with('success', 'Thank you for subscribing!');
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


    public function subscribesent()
    {
        return view('subscribesent');
    }

    public function contactsent()
    {
        return view('contactsent');
    }


    public function getImg($filename)
    {
   
        $image = Storage::disk('images')->get($filename);
   
        $mime = Storage::disk('images')->mimeType($filename);
   
        return (new Response($image, 200))->header('Content-Type', $mime);
    }

    public function adminlogin(Request $request)
    {
        // Validate the form data
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('admin.index'); // Assuming 'admin.index' is the route name for the admin panel
        }
    
        // Authentication failed, redirect back with error message
        return back()->withErrors(['message' => 'Invalid credentials']);
    }


    public function aboutUs()
    {
        return view('about-us');
    }



    public function contactUs()
    {
        return view('contact');
    }
}
