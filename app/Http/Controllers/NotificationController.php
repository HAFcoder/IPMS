<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Auth;

use App\Notifications\NotificationApps;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function markAsReadLecturer($id){

        $uid = Auth::user()->id;

        $lecturer = Lecturer::where('id',$uid)->first();
        $lecturer->unreadNotifications->markAsRead();

    }

    public function addNotificationLecturer($id,$message){

        // $uid = Auth::user()->id;

        // $lect = Lecturer::where('id',$uid)->first();
        // $message = "You have new notification.";
        // Notification::send($lect, new NotificationApps($message));

        // foreach($lect->unreadNotifications as $noti ){
        //     dump($noti->data);
        // }

        $lecturer = Lecturer::where('id',$id)->first();
        Notification::send($lecturer, new NotificationApps($message));

    }

    public function testNotification(){

        //send notification to coordinator
        $message = "There is new student registered - ";
        $lecturer = $this->getAllCoordinator();  //get all coor lecturer
        dump($lecturer);
        foreach($lecturer as $lect){
            //dump($lect);
            $notif = $this->addNotificationLecturer($lect->id,$message);

        }

    }
}
