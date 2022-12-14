<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;
use App\Models\specialities;
use App\Models\Doctors;
use App\Models\schedule;
use App\Models\receptions;
use App\Models\Records;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class recordController extends Controller
{

    public function specialitiesToSelect(){
        $specialities = specialities::all();
        return view('record', ['specialities'=>$specialities]);
    }

    public function doctorSelect(Request $request){
        if($request->ajax()){
            $doctors = DB::table('doctors')->where('speciality_id',$request->id_speciality)
                ->pluck("DoctorFIO","id");
            $data = view('selectDoctor',['doctors' => $doctors])->render();
            return response()->json(['options'=>$data]);
        }
    }

    public function check(Request $request){
        if($request->ajax()){
            $schedule=DB::table('schedules')->where('DoctorFIO_id',$request->id_doctor)
                ->where('receptionDate',$request->date)->first();

            $receptionStartTime=date_create($schedule->receptionStartTime); //начало приема

            $receptionEndTime=date_create($schedule->receptionEndTime); //конец приема
            $receptionTime=DB::table('receptions')->where('id',$schedule->receptionTime_id)
                ->value('receptionTime');//время на 1 прием

                  //dd(date_format($receptionStartTime, 'd.m.Y H.i.s'));
            $dateToSelect=array();
            for ($i = $receptionStartTime; $i<$receptionEndTime;){
                $checkingRecords=DB::table('records')->where('recordTIme',date_format($i, 'Y-m-d H:i:s'))->first();
                //dd($checkingRecords->item);
                if(!isset($checkingRecords->id_patientFIO)){
                    //$dateToSelect=date_format($i, 'Y-m-d H:i:s');
                    array_push($dateToSelect, date_format($i, 'H:i:s'));
                    //$data = view('selectCheck',['checkTime'=>$dateToSelect])->render();
                     //dd($data);
                    //return response()->json(['options'=>$data]);
                }
                $i=date_modify($receptionStartTime, $receptionTime .' minutes');
                //$i=date_format($receptionStartTime, 'Y-m-d H:i:s');
                //dd($i);
            }
            $data = view('selectCheck',['checkTime'=>$dateToSelect])->render();
            return response()->json(['options'=>$data]);
        }
    }

    public function recordPatient(Request $request){
        $patientForCheck=DB::table('patients')->where('patient_FIO', $request->patientFIO)
            ->where('birthdate', $request->patientBirthdate)
            ->where('phoneNumber', $request->patientPhone)->first();
        if(isset($patientForCheck)){
            $record= new Records;
            $record->id_patientFIO = $patientForCheck->id;
            $recordDate = $request->checkDate . ' ' . $request->check;
            $record->recordTIme = $recordDate;
            $record->id_doctorFIO = $request->id_doctor;
            $record->save();
        }else{
            $patient = new Patients;
            $patient->patient_FIO = $request->patientFIO;
            $patient->birthdate = $request->patientBirthdate;
            $patient->phoneNumber = $request->patientPhone;
            $patient->save();
            $this->recordPatient($request);
        }
        return redirect(route('specialities.show'));
    }
}
