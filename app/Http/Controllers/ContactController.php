<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactEmail; // Import the ContactEmail model


class ContactController extends Controller
{


            public function storeContact(Request $request)
        {
            $data = $request->validate([
                'fullname' => 'required|string',
                'email' => 'required|email',
                'contactno' => 'required|string',
                'message' => 'required|string',
            ]);

            // Create a new contact email entry
            ContactEmail::create($data);
        // Redirect back or return a response
        return redirect()->route('contactsent')->with('success', 'Your message has been sent successfully!');

        }


                public function delete($id)
        {
            $email = ContactEmail::findOrFail($id);
            $email->delete();

            return redirect()->route('contactlist')->with('success', 'Contact email deleted successfully.');
        }

}
