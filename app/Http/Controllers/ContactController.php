<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ContactController extends Controller
{
    use ValidatesRequests;
       // Create Contact Form
    public function createForm(Request $request) {
      return view('landing.contact');
    }

    // Store Contact Form data
    public function ContactUsForm(Request $request) {

        // Form validation
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
            'subject'=>'required',
            'deskripsi' => 'required'
         ]);

        //  Store data in database
        Contact::create($request->all());

        // 
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }
}
