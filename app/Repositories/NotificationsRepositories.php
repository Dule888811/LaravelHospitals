<?php


namespace App\Repositories;


use App\Notification;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsRepositories implements NotificationsRepositoriesInterface
{
    public function index()
    {
        if(Auth::user()){
            return Auth::user()->Notifications()->get()->toArray();
        }else{
            return $notifications = array();
        }

    }

    public function store(Request $request, User $user)
    {
        $notification = new Notification();
        $notification->seen = false;
        $notification->notification_content	= $request->notification_content;
        $notification->target_specialties = $user->email;
        $notification->save();
    }

    public function seen($id)
    {
        $notification = Notification::find($id);
        $notification->seen = true;
        $notification->seen_at = Carbon::now();
        $notification->save();
    }
}