<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\specialities;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    function findAll(){
        $doctors = Doctors::with('speciality')->select()->get();
        //dd($doctors);
        return view('doctors',['doctors'=>$doctors]);
    }
}
