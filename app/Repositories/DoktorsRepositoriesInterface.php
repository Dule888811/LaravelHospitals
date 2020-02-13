<?php

namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;

interface DoktorsRepositoriesInterface
{
    public function update(Request $request, User $user);
}