<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validate all data coming form request
        $this->validate($request, [
            'username'  => 'required|string',
            'email'     => 'required|email',
            'message'   => 'required',

        ]);

        // Create new row in database
        Contact::create([
            'username'  => $request->username,
            'email'     => $request->email,
            'message'   => $request->message,
        ]);

        return redirect()->back();
    }
}
