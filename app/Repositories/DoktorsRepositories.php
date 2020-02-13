<?php


namespace App\Repositories;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DoktorsRepositories implements DoktorsRepositoriesInterface
{
    public function update(Request $request, User $user)
    {
        $user->remember_token = Str::random(10);
        $user->password = Hash::make($request->doctor_password);
        $user->save();
    }
}