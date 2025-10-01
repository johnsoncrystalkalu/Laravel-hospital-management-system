<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addDoctors(){
        return view('admin.add_doctors');
    }

    public function postAddDoctors(Request $request){
        $doctor = new Doctor();
        $doctor->doctors_name = $request->doctors_name;
        $doctor->doctors_phone = $request->doctors_phone;
        $doctor->specialty = $request->specialty;
        $doctor->room_number = $request->room_number;
        $image = $request->doctors_image;

        if($image){
            $image_name = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();
            $doctor->doctors_image = $image_name;
        }
        $doctor->save();

        if($image && $doctor->save()){
            $request->doctors_image->move('project_images', $image_name);
        }
        return redirect()->back()->with('success_message', 'Doctor Added successsfully');

    }

    public function viewAppointments(){
        //return 'hello';
        $appointments  = Appointment::all();
        return view('admin.view_appointment', compact('appointments'));
    }

    public function viewDoctors(){
        $doctors = Doctor::all();
        return view('admin.view_doctors', compact('doctors'));
    }

    public function deleteDoctor($id){
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        //added it myself
        $imagePath = public_path('project_images/'.$doctor->doctors_image);

    // Check and delete
    if($doctor->doctors_image && file_exists($imagePath)) {
        unlink($imagePath);
    }

        return redirect()->back();
    }

    public function updateDoctor($id){
        $doctor = Doctor::findOrFail($id);
        return view('admin.update_doctor', compact('doctor'));
    }

    public function editAddDoctors(Request $request, $id){
     $doctor = Doctor::findOrFail($id);

     $doctor->doctors_name = $request->doctors_name;
     $doctor->doctors_phone = $request->doctors_phone;
     $doctor->specialty = $request->specialty;
     $doctor->room_number = $request->room_number;
     $image = $request->doctors_image;

     if($image){
         $image_name = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();
         $doctor->doctors_image = $image_name;
     }

     $doctor->save();

        if($image && $doctor->save()){
            $request->doctors_image->move('project_images', $image_name);
        }
        return redirect()->back()->with('success_updatemessage', 'Doctor Updated successsfully');
    }

    public function changeStatus(Request $request, $id){
        $appointment = Appointment::findOrFail($id);

        $appointment->status = $request->status;
        $appointment->save();
        return redirect()->back();

    }

}
