<?php

namespace App\Http\Controllers\Admin;

use App\Hospital;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\HospitalRepositories;
use App\Repositories\Admin\HospitalRepositoriesInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
class HospitalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */
    private  $_hospitalRepositories;
    public function __construct(HospitalRepositoriesInterface $hospitalRepositories)
    {
        $this->_hospitalRepositories = $hospitalRepositories;
    }


    public function index()
    {
        $hospitals = $this->_hospitalRepositories->all();
        return view('admin.hospital.index')->with(['hospitals' => $hospitals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hospital.create');
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
            'hospital_name' => 'required',
            'image' => 'required|image|max:5000000|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100,max_width=1050,max_height=1000'
        ]);
        $this->_hospitalRepositories->store($request);
          return redirect()->route('admin.main');
    }



    public function edit(Hospital $hospital)
    {
        return view('admin.hospital.edit')->with(['hospital' => $hospital]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Hospital $hospital)
    {
        $this->_hospitalRepositories->update($request,$hospital);
        return redirect()->route('admin.main');
    }



    public function delete($id)
    {
        return view('admin.hospital.delete')->with(['id' => $id]);
    }

    public function deleted($id)
    {
        $this->_hospitalRepositories->deleted($id);
        return redirect()->route('admin.main');
    }
}
