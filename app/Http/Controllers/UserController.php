<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
        if(Auth::check() && Auth::user()->user_type=='user'){
            //dd(Auth::user()->email);
            return view('dashboard');
        }
        elseif(Auth::check() && Auth::user()->user_type=='admin'){
            return view('admin.dashboard');
        }
        else{
            return redirect('/');
        }
    }

    public function index(){

        $doctors = Doctor::all();
        return view('index', compact('doctors'));
    }


    public function allDoctors(){

        $doctors = Doctor::all();
        return view('doctors', compact('doctors'));
    }

    public function makeAppointment(Request $request){

        $appointment = new Appointment();
        $appointment->full_name       = $request->full_name;
        $appointment->email_address   = $request->email_address;
        $appointment->submission_date = $request->submission_date;
        $appointment->speciality      = $request->speciality;
        $appointment->number          = $request->number;
        $appointment->message         = $request->message;

        $appointment->save();

        return redirect()->back()->with('appointment_message', 'Thannks for booking us');

    }

}
