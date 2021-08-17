<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\InternMail;
use App\Mail\LogbookApprovalMail;
use App\Mail\StudentEvaluationMail;
use Illuminate\Support\Facades\Crypt;
use Mail;

class MailingController extends Controller
{
   
    public function declineMail($encryptedstudentid)
    {
        $myEmail = 'novatechdevelopers@gmail.com';
   
        $details = [
            'title' => 'Internship Declination',
            'url' => 'http://www.kuptm.edu.my/'
        ];
  
        Mail::to($myEmail)->send(new InternMail($details));
   
        return "Email sent successfully";
    }

    public function logbookApprovalMail($encryptedstudentid)
    {
        $myEmail = 'novatechdevelopers@gmail.com';
   
        $details = [
            'title' => 'Internship weekly logbook Update',
            'url' => 'http://www.kuptm.edu.my/',
            'name' => 'Hamzah Botak',
            'company' => 'Nova Tech'
        ];
  
        Mail::to($myEmail)->send(new LogbookApprovalMail($details));
   
        return "Email sent successfully";
    }

    public function studentEvaluationMail($encryptedstudentid)
    {
        $myEmail = 'novatechdevelopers@gmail.com';
   
        $details = [
            'title' => 'Student Evaluation Form',
            'url' => 'http://www.dummyipms.com/evaluation/' . $encryptedstudentid
        ];
  
        Mail::to($myEmail)->send(new StudentEvaluationMail($details));
   
        return "Email sent successfully";
    }


    // TEST 


    public function testdeclineMail($encryptedstudentid)
    {
        $myEmail = 'novatechdevelopers@gmail.com';
   
        $details = [
            'title' => 'Internship Declination',
            'url' => 'http://www.dummyipms.com/declination/' . $encryptedstudentid,
            'name' => 'Hamzah Botak',
            'company' => 'Nova Tech'
        ];
  
        Mail::to($myEmail)->send(new InternMail($details));
   
        return "Declination mail sent successfully";
    }

    public function testlogbookApprovalMail($week,$encryptedstudentid)
    {
        $myEmail = 'novatechdevelopers@gmail.com';
        $week = strval($week);
        $details = [
            'title' => 'Internship weekly logbook Update',
            'week' => $week,
            'url' => 'http://www.dummyipms.com/dummy/' . $week . '/' . $encryptedstudentid,
            'name' => 'Hamzah Botak',
            'company' => 'Nova Tech'
        ];
  
        Mail::to($myEmail)->send(new LogbookApprovalMail($details));
   
        return "Logbook approval mail sent successfully";
    }

    public function teststudentEvaluationMail($encryptedstudentid)
    {
        $myEmail = 'novatechdevelopers@gmail.com';
        $details = [
            'title' => 'Internship Evaluation',
            'url' => 'http://www.dummyipms.com/dummy/' . $encryptedstudentid,
            'name' => 'Hamzah Botak',
            'company' => 'Nova Tech'
        ];
  
        Mail::to($myEmail)->send(new studentEvaluationMail($details));
   
        return "Evaluation mail sent successfully";
    }
}