<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\InternMail;
use Mail;

class MailingController extends Controller
{
   

    public function declineMail()
    {
        $myEmail = 'novatechdevelopers@gmail.com';
   
        $details = [
            'title' => 'Mail Demo from KUPTM Internship(IPMS)',
            'url' => 'http://www.kuptm.edu.my/'
        ];
  
        Mail::to($myEmail)->send(new InternMail($details));
   
        return "Email sent successfully";
    }
}
