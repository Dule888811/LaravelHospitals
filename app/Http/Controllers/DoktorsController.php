<?php

namespace App\Http\Controllers;

use App\Repositories\DoktorsRepositories;
use App\Repositories\DoktorsRepositoriesInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DoktorsController extends Controller
{
    private $_doktorsRepositories;
    public function __construct(DoktorsRepositoriesInterface $doktorsRepositories)
    {
        $this->_doktorsRepositories = $doktorsRepositories;
    }

    public function showForm(User $user)
    {
        return view('emails.password')->with(['user' => $user]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->_doktorsRepositories->update($request,$user);
        return redirect()->route('notification.index');
    }



}
