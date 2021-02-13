<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }
    public function patientProfile(Request $request)
    {
        // dd($request->toArray());
        DB::table('users')->where('id','=',auth()->user()->id)->update(['role_id' => 3]);
        DB::table('patients')->insert([
            'role_id' => 3,
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'marital_status' => $request->marital_status,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect('/dashboard')->with('modal',true);
    }
    public function doctorProfile(Request $request)
    {
        DB::table('users')->where('id','=',auth()->user()->id)->update(['role_id' => 2]);
        DB::table('doctors')->insert([
            'role_id' => 2,
            'name' => $request->name,
            'gender' => $request->gender,
            'speciality' => $request->speciality,
            'phone' => $request->phone,
        ]);
        return redirect('/dashboard')->with('modal',true);
    }
    public function adminProfile(Request $request)
    {
        DB::table('users')->where('id','=',auth()->user()->id)->update(['role_id' => 1]);
        DB::table('admins')->insert([
            'role_id' => 1,
            'name' => $request->name,
            'gender' => $request->gender,
            'phone' => $request->phone,
        ]);
        return redirect('/dashboard')->with('modal',true);
    }
}
