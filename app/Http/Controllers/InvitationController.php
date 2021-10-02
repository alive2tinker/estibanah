<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormInvitation;

class InvitationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $emails = explode(",",$request->input('emailList'));
        $cleanEmails = [];
        foreach($emails as $email){
            $cEmail = str_replace(' ','',$email);
            array_push($cleanEmails, $cEmail);
        }
        Mail::to($cleanEmails)->queue(new FormInvitation($request->input('link'), $request->input('title')));

        return redirect()->back();
    }
}
