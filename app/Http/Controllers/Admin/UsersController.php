<?php

namespace App\Http\Controllers\Admin;

use App\Hospital;
use App\Http\Controllers\Controller;
use App\Specialty;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Mail\ProvidePassword;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index()
    {
        $users = User::all();
        return view('admin.user.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = url()->full();
        $url = explode('?',$url);
         $url = $url[1];
         $id = explode('=',$url);
         $id = $id[0];
        $specialties = Specialty::all();
        return view('admin.user.create')->with(['specialties' => $specialties,'hospital_id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'doctor_name' => 'required',
            'doctor_surname' => 'required',
            'doctor_address' => 'required',
            'email' => 'required|email|unique:users',
            'specialty' => 'required',
            'hospital' => 'required'
        ]);


        $user = new User();
        $user->name = $request->doctor_name;
        $user->surname = $request->doctor_surname;
        $user->address = $request->doctor_address;
        $user->email = $request->email;
        $user->specialty_id = $request->specialty;
        $user->hospital_id = $request->hospital;
        $user->save();
        Mail::to($user)->send(new ProvidePassword($user));
        return redirect()->route('admin.main');
    }






}
