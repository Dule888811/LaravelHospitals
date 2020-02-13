<?php


namespace App\Repositories\Admin;


use App\User;
use Illuminate\Http\Request;

class UsersRepositories implements UsersRepositoriesInterface
{
    public function all()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->doctor_name;
        $user->surname = $request->doctor_surname;
        $user->address = $request->doctor_address;
        $user->email = $request->email;
        $user->specialty_id = $request->specialty;
        $user->hospital_id = $request->hospital;
        $user->save();
        return $user;
    }
}