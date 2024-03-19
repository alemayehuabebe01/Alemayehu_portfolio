<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function ContactPage(){
        return view('frontend.contact');
    }//end method

    public function MainHome(){
        return view('frontend.index');
    }// function for home page in the fornt end 

    public function StoreMessage(Request $request){
        $request ->validate([
            'name'=> 'required',
            'email'=> 'required',
            'subject'=> 'required',
            'phone'=> 'required',
            'message'=> 'required',
            
         [
          'name.required' => 'Sender Name Is Required',
          'email.required' => 'Email Is Required',
          'subject.required' => 'Subject  Is Required',
          'phone.required' => 'Phone number Is Required',
          'message.required' => 'Message  Is Required',
    
    
         ] ]);

         Contact::insert([

            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'phone'=>$request->phone,
            'message'=>$request->message,
            'created_at' => Carbon::now(),
            
        ]);

        $notification = array (
            'message' => 'Message Sent Successfuly',
            'alert-type'=> 'success'
        );
        return redirect()->back()->with($notification);
    }// end method function

    public function AllMessage(){
        $messages = Contact::latest()->get();
        return view('admin.contact.all_contact', compact('messages'));
    }// end message


    public function DeleteMessage(Request $request ,$id){

        Contact::findOrFail($id)->delete();

          $notification = array (
          'message' => 'Message Deleted Successfuly',
          'alert-type'=> 'success'
          );
      return redirect()->back()->with($notification);
    }
}
