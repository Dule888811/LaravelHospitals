<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Auth::user()->Notifications()->get()->toArray();
        return view('notification.index')->with(['notifications' => $notifications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = url()->full();
        $url = explode('/',$url);
        $id = end($url);
        $user = User::find($id);
       return view('notification.create')->with(['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
       $notification = new Notification();
        $notification->seen = false;
        $notification->notification_content	= $request->notification_content;
        $notification->target_specialties = $user->email;
        $notification->save();
        return redirect()->route('admin.main');
    }


}
