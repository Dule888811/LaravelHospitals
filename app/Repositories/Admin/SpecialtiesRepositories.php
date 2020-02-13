<?php


namespace App\Repositories\Admin;


use App\Specialty;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SpecialtiesRepositories implements SpecialtiesRepositoriesInterface
{
    public function all()
    {
        return Specialty::all();
    }

    public function store(Request $request)
    {
        $speciality = new Specialty();
        $speciality->name = $request->specialtiy_name;
        $speciality->save();
    }

    public  function update(Request $request, Specialty $specialty)
    {
        $specialty->name = $request->spec;
        $specialty->update();
    }

    public function deleted($id)
    {
        $specialty = Specialty::find($id);
        $specialty->active = 0;
        $specialty->deleted_at = Carbon::now();
        $specialty->update();
    }
}