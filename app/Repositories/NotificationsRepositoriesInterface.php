<?php

namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;

interface NotificationsRepositoriesInterface
{
    public function index();

    public function store(Request $request, User $user);

    public function seen($id);
}