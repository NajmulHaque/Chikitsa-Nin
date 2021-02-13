<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;
use App\models\HospitalPharmacy;
use App\models\PatientRequest;
use Session;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function requestMedical(Request $request)
    {
        $title='Request Medical Assistant';
        $categories = Category::all();
        // $hospitals = Category::with('hospitals_pharmacies')
        //     ->searchResults()
        //     ->paginate(9);
        // $pharmacies = Category::with('pharmacies')
        //     ->searchResults()
        //     ->paginate(9);
        $requestDetails =   HospitalPharmacy::join('categories','categories.id','=','hospitals_pharmacies.category_id')
            ->select('hospitals_pharmacies.*','categories.name as category_name', 'categories.id as category_id')
            ->where('categories.id','=',$request->category)->get();
        $mapDetails = $requestDetails->makeHidden(['active', 'created_at', 'updated_at', 'deleted_at']);
        // dd($mapDetails->toArray());
        // $mapPharmacies = $pharmacies->makeHidden(['active', 'created_at', 'updated_at', 'deleted_at']);
        $latitude = $requestDetails->count() && ($request->category) ? $requestDetails->average('latitude') : 23.815104;
        $longitude = $requestDetails->count() && ($request->category) ? $requestDetails->average('longitude') : 90.425537;
        return view('pages.requestmedical')->with([
            'categories' => $categories,
            'title' => $title,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'mapDetails' => $mapDetails,
        ]);
    }
    public function requestMedicalIndex($id)
    {
        $details    =   HospitalPharmacy::join('categories','categories.id','=','hospitals_pharmacies.category_id')
            ->select('hospitals_pharmacies.*','categories.name as ctg_name')
            ->where('hospitals_pharmacies.id','=',$id)->get();
            // dd($details->toArray());
        return view('pages.request-medical-index')->with([
            'details' => $details,
        ]);
    }
    public function requestMedicalStore(Request $request)
    {
        $patient = DB::table('patients')->select('patients.id')->where('user_id',auth()->user()->id)->get();
        foreach ($patient as $patient_id) {
    	$requestDetails = new PatientRequest();
		$requestDetails->patient_id = $patient_id->id;
		$requestDetails->name = $request->request_name;
		$requestDetails->type = $request->type;
		$requestDetails->address = $request->request_address;
		$requestDetails->description = $request->request_description;
        $requestDetails->reason = $request->request_reason;
        $requestDetails->save();
        return redirect('/dashboard');
        }
        
    }
}
