<?php

namespace App\Http\Controllers\Admin;

use App\Hospital;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
class HospitalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::all();
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
      if(isset(Hospital::all()->serial_number)){
          $serialN = Hospital::all()->serial_number;
          $alphas = range('A', 'Z');

          foreach($serialN as $number)
          {
              $serial_number=Arr::random($alphas, 8);
              $serial_number   = implode(" ",$serial_number);
              if($number != $serial_number)
              {
                  break;
              }
          }
          $hospital = new Hospital();
          $hospital->serial_number = $serial_number;
          $hospital->name = $request->hospital_name;
          $image = file_get_contents($_FILES['image']['tmp_name']);
          $image = base64_encode($image);
          $hospital->image = $image;
          $hospital->save();
          return redirect()->back();
        }else{
            $alphas = range('A', 'Z');
            $serial_number=Arr::random($alphas, 8);
            $serial_number   = implode(" ",$serial_number);
            $image = file_get_contents($_FILES['image']['tmp_name']);
            $image = base64_encode($image);
            $hospital = new Hospital([
              'serial_number' => $serial_number,
              'name' => $request->hospital_name,
              'image' => $image
          ]);
            $hospital->save();
          return redirect()->route('admin.main');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
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
        $hospital->name = $request->hospital_name;
        if ($request->imageHospital)
        {
            $image = file_get_contents($_FILES['imageHospital']['tmp_name']);
            $image = base64_encode($image);
            $hospital->image = $image;
        }
        $hospital->update();
        return redirect()->route('admin.main');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {

    }

    public function delete($id)
    {
        return view('admin.hospital.delete')->with(['id' => $id]);
    }

    public function deleted($id)
    {
        $hospital  = Hospital::find($id);
        $hospital->active = 0;
        $hospital->deleted_at = Carbon::now();
        $hospital->update();
        return redirect()->route('admin.main');
    }
}
