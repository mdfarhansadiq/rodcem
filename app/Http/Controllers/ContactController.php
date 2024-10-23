<?php

namespace App\Http\Controllers;

use App\Mail\ContactReply;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact_store(Request $request)
    {
        // $request->validate([
        //     'name'             => 'required',
        //     'phone_number'     => 'required',
        //     'message'          => 'required',            
        // ]);
      
        Contact::Create($request->all());
        return back()->with('success', 'Thanks For Contact Us');
    }

    public function index()
    {
        return view('Super.contact.index', ['contacts' => Contact::latest()->get()]);
    }

    public function status(Request $request)
    {
        $contact = Contact::find($request->id);
        $contact->status = 1;
        $contact->save();

        return response()->json(['successs' =>'success', 'id' => $request->id]);
    }

    //reply message
    public function reply(Request $request, $id)
    {
        $contact = Contact::find($id);
        $data = ['name' => $contact->name, 'reply_message' => $request->reply_message];

        Mail::to($contact->email)->send(new ContactReply($data));

       $contact = Contact::find($id);
       $contact->status = 10;
       $contact->save();

        return back()->with('success' ,'Message Send Successfull!');
    }

    //delete contact
    public function delete($id)
    {
        Contact::find($id)->delete();
        return back()->with('success' ,'Message Delete Successfull!');
    }
}
