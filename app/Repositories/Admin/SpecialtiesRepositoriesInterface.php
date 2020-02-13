<?php

namespace App\Repositories\Admin;

use App\Specialty;
use Illuminate\Http\Request;

interface SpecialtiesRepositoriesInterface
{
    public function all();

    public function store(Request $request);

    public function update(Request $request, Specialty $specialty);

    public function deleted($id);
}