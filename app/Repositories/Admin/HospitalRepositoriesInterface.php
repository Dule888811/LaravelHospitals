<?php

namespace App\Repositories\Admin;

use App\Hospital;
use Illuminate\Http\Request;

interface HospitalRepositoriesInterface
{
    public function all();

    public function store(Request $request);

    public function update(Request $request, Hospital $hospital);

    public function deleted($id);
}