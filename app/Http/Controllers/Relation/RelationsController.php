<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use App\model\Hospital;
use App\model\phone;
use App\User;
use Illuminate\Http\Request;
use App\model\Doctor;

class RelationsController extends Controller
{
    public function hasOneRelation()
    {
        $user=User::with(['getPhone'=>function($q){
            $q->select('number','user_id');
        }])->find(6);


        return  $user;

//        $phone=phone::find(1);
//        return  $phone->getuser;
    }
    public function getHasPhone()
    {
        return  $user=User::whereHas('getPhone', function ($q){
            $q->where('code',2);
        } )->get() ;

    }

    public function getHasNotPhone()
    {
        return $user=User::whereDoesntHave('getPhone')->get() ;

    }

    public function getHospital()
    {
        $hospital =Hospital::find(1);
        return $hospital->doctors;

    }
    public function hospital()
    {
        $hospital =Hospital::select('id', 'name','address')->get();
        return view('doctor.hospital' , compact('hospital'));
    }


    public function doctor($id)
    {
        $hospital =$hospital =Hospital::find($id);
        $doctor = $hospital->doctors ;
        return view('doctor.doctor',compact('doctor'));
    }

    public function hospitalDelete($id)
    {
        $hospital =Hospital::find($id);
        if (!$hospital){
            return abort(404);
        }

        $hospital->doctors()->delete();
        $hospital->delete();

    }


    public function doctorServiceweb()
    {
        $doctor = Doctor::find(2);
        return $doctor->services;
    }

    public function doctorServiceShow($idDoctor)
    {
        $doctor = Doctor::find($idDoctor);
        return $doctor->services;

    }




}
