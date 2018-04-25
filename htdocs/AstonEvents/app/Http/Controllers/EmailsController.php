<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use App\Event;
use DB;

class EmailsController extends Controller
{

    public function show($id){
        $event = Event::find($id);
        return view('email')->with('event', $event);
    }

    public function send(Request $request){

        $this->validate($request,
        [
        'senderName' => 'required',
        'senderAddress' => 'required|email',
        'emailBody' => 'required'
        ]);

        $senderName = $request->input('senderName');
        $senderAddress = $request->input('senderAddress');
        $emailBody = $request->input('emailBody');

        $selectedEvent = Event::find($request->eventId);    

        $emailSubject = $selectedEvent->title;
        $organiserId = $selectedEvent->user_id;

        $selectedOrganiser = User::find($organiserId);

        $organiserAddress = $selectedOrganiser->email;
        $organiserName = $selectedOrganiser->name;

//     dd($selectedEvent, $request->senderName, $request->senderAddress, $request->emailBody, $organiserId, $organiserAddress, $organiserName);

        Mail::send('emailTemplate', ['emailBody' => $emailBody], function($message) use($senderAddress, $senderName, $organiserAddress, $organiserName, $emailSubject, $selectedEvent){
            $message->from($senderAddress, $senderName);
            $message->to($organiserAddress, $organiserName)->subject($emailSubject);
        });
        
        $request->session()->flash('success', 'Email Sent Successfully');

        return view('events.show')->with('event', $selectedEvent);
    }
}
?>