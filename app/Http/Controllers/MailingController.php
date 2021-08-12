<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\InternMail;
use App\Mail\LogbookApprovalMail;
use App\Mail\StudentEvaluationMail;
use Mail;

class MailingController extends Controller
{
   

    public function declineMail()
    {
        $myEmail = 'novatechdevelopers@gmail.com';
   
        $details = [
            'title' => 'Internship Declination',
            'url' => 'http://www.kuptm.edu.my/'
        ];
  
        Mail::to($myEmail)->send(new InternMail($details));
   
        return "Email sent successfully";
    }

    public function logbookApprovalMail()
    {
        $myEmail = 'novatechdevelopers@gmail.com';
   
        $details = [
            'title' => 'Internship weekly logbook Update',
            'url' => 'http://www.kuptm.edu.my/'
        ];
  
        Mail::to($myEmail)->send(new LogbookApprovalMail($details));
   
        return "Email sent successfully";
    }

    public function studentEvaluationMail()
    {
        $myEmail = 'novatechdevelopers@gmail.com';
   
        $details = [
            'title' => 'Student Evaluation Form',
            'url' => 'http://www.kuptm.edu.my/'
        ];
  
        Mail::to($myEmail)->send(new StudentEvaluationMail($details));
   
        return "Email sent successfully";
    }
}
