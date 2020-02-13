<?php

namespace App\Http\Controllers;

use App\Repositories\NotificationsRepositories;
use App\Repositories\NotificationsRepositoriesInterface;
use App\User;
use Carbon\Carbon;
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
    private $_notificationsRepositories;

    public function __construct(NotificationsRepositoriesInterface $notificationsRepositories)
    {
        $this->_notificationsRepositories = $notificationsRepositories;
    }

    public function index()
    {
        $notifications = $this->_notificationsRepositories->index();
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
        $this->_notificationsRepositories->store($request,$user);
        return redirect()->route('admin.main');
    }



    public function seen()
    {
        $url = url()->full();
        $url = explode('/',$url);
        $id = end($url);
        $this->_notificationsRepositories->seen($id);
        return redirect()->route('home');
    }


}
