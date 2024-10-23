<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    // index 
    public function index()
    {
        return view('Super.subscriber.index', ['data' => Subscriber::latest()->paginate(20)]);
    }
    
    //store
    public function store(Request $request)
    {
        $subscriber = Subscriber::where('email', $request->email)->exists();
        if(!$subscriber)
        {
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->save();            
            return back()->with('success', 'Thanks For Subscribe Us!');
        }else{
            return back()->with('error', 'Already Subscribed!');
        }

    }

    // delete 
    public function delete($id)
    {
        Subscriber::find($id)->delete();
        return back()->with('success', 'Subscriber Delete Successfull!');
    }
}
