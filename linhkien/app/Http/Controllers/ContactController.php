<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    //
    public function viewContactUs()
    {
        # code...
        return view("components.contact");
    }
    public function contact(Request $request)
    {
        # code...
        // return dd($request->all());
        $r = Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'content' => $request->content,
        ]);
        return "success";
    }
   
}
