<?php

namespace App\Repositories\Admin;

use Illuminate\Http\Request;

interface UsersRepositoriesInterface
{
    public function all();

    public function store(Request $request);
}