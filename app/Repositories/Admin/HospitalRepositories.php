<?php


namespace App\Repositories\Admin;


use App\Hospital;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class HospitalRepositories implements HospitalRepositoriesInterface
{
        public function all()
        {
            return Hospital::all();
        }

        public function store(Request $request)
        {
            if(isset($this->all()->serial_number)){
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
            }else {
                $alphas = range('A', 'Z');
                $serial_number = Arr::random($alphas, 8);
                $serial_number = implode(" ", $serial_number);
                $image = file_get_contents($_FILES['image']['tmp_name']);
                $image = base64_encode($image);
                $hospital = new Hospital([
                    'serial_number' => $serial_number,
                    'name' => $request->hospital_name,
                    'image' => $image
                ]);
                $hospital->save();
            }
        }

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
        }

        public function deleted($id)
        {
            $hospital  = Hospital::find($id);
            $hospital->active = 0;
            $hospital->deleted_at = Carbon::now();
            $hospital->update();
        }


}