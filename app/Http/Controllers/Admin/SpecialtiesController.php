<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\SpecialtiesRepositories;
use App\Repositories\Admin\SpecialtiesRepositoriesInterface;
use App\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
class SpecialtiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $_specialtiesRepositories;

    public function __construct(SpecialtiesRepositoriesInterface $specialtiesRepositories)
    {
        $this->_specialtiesRepositories = $specialtiesRepositories;
    }

    public function index()
    {
       $specialties = $this->_specialtiesRepositories->all();
        return view('admin.specialties.index')->with(['specialties' => $specialties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specialties.create');
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
            'specialtiy_name' => 'required'

        ]);
       $this->_specialtiesRepositories->store($request);
        return redirect()->route('admin.main');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */



    public function edit(Specialty $specialty)
    {
        return view('admin.specialties.edit')->with(['specialty' => $specialty]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialty $specialty)
    {
        $this->_specialtiesRepositories->update($request,$specialty);
        return redirect()->route('admin.main');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        return view('admin.specialties.delete')->with(['id' => $id]);
    }

    public function deleted($id)
    {
        $this->_specialtiesRepositories->deleted($id);
        return redirect()->route('admin.main');
    }
}
