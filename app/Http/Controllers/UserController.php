<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ContactEmail;

class UserController extends Controller
{
    // Method to display all registered users
    public function index()
    {
        // Fetch all users from the database
        $users = User::all();

        // Pass the users data to a view for display
        return view('admin/registered-users', ['users' => $users]);
    }

    public function contactlist()
    {
        // Fetch all contact emails from the database
        $contactEmails = ContactEmail::all();

        // Pass the contact emails to the view
        return view('admin/contactlist', compact('contactEmails'));
    }
}
