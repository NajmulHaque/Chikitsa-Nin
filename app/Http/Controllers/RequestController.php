<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function requestMedicalList()
    {
        $user_id    =   auth()->user()->id;
        $medicals   =   DB::table('patient_requests')
            ->join('patients','patients.id','=','patient_requests.patient_id')
            ->join('users','users.id','=','patients.user_id')
            ->select('patients.name as patient_name','patients.phone','users.email','patient_requests.*')
            ->where('type','hospital')->get();
        return view('pages.request-medical-list')->with([
            'medicals'  =>  $medicals,
        ]);
    }
    public function requestMedicineList()
    {
        $pharmacies   =   DB::table('patient_requests')
            ->join('patients','patients.id','=','patient_requests.patient_id')
            ->join('users','users.id','=','patients.user_id')
            ->select('patients.name as patient_name','patients.phone','users.email','patient_requests.*')
            ->where('type','pharmacy')->get();
        return view('pages.request-medicine-list')->with([
            'pharmacies'  =>  $pharmacies,
        ]);

    }
    public function sampleRequest(Request $request)
    {
        $patient = DB::table('patients')->select('patients.id')->where('user_id',auth()->user()->id)->get();
        foreach ($patient as $patient_id) {
            DB::table('sample_collection')->insert([
                'patient_id' => $patient_id->id,
                'sample_info' => $request->sample_info,
            ]);
        }
        return redirect('/dashboard');
    }  
    public function requestSampleList()
    {
        $request_samples = DB::table('sample_collection')
            ->join('patients','patients.id','=','sample_collection.patient_id')
            ->join('users','users.id','=','patients.user_id')
            ->select('sample_collection.sample_info','patients.*','users.email')->get();
        return view('pages.request-sample-list')->with([
            'request_samples'  =>  $request_samples,
        ]);

    }
}
