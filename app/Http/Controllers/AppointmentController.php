<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\User;
use App\Appointment;
use App\Setting;
use Redirect;


class AppointmentController extends Controller
{

	public function __construct(){
        $this->middleware('auth');
    }

    public function create(){

    	$patients = User::where('role','patient')->get();
	    return view('appointment.create', ['patients' => $patients]);
    }

    public function creat(){

    	$patients = User::where('role','patient')->get();
	    return view('appointment.creat', ['patients' => $patients]);
    }




	public function store(Request $request){

		$validatedData = $request->validate([
        	'patient_id' => ['required','exists:users,id'],
            //'date' => ['required'],
           // 'time_start' => ['required'],
            //'time_end' => ['required'],

    	]);
    	$appointment = new Appointment();
		$appointment->user_id = $request->patient_id;
		$appointment->date = $request->date;
		$appointment->time_start = $request->time_start;
		$appointment->time_end = $request->time_end;
		$appointment->visited = 0;
		$appointment->save();

		return Redirect::route('appointment.all')->with('success', 'Appointment Created Successfully!');
}

public function stor(Request $request){

    $validatedData = $request->validate([
        'patient_id' => ['required','exists:users,id'],
        //'date' => ['required'],
       // 'time_start' => ['required'],
        //'time_end' => ['required'],

    ]);
    $appointment = new Appointment();
    $appointment->user_id = $request->patient_id;
    $appointment->date = $request->date;
    $appointment->time_start = $request->time_start;
    $appointment->time_end = $request->time_end;
    $appointment->visited = 0;
    $appointment->save();

    return Redirect::route('admin.appointment.al')->with('success', 'Appointment Created Successfully!');
}
	
    public function store_edit(Request $request){

        $validatedData = $request->validate([
            'rdv_id' => ['required','exists:appointments,id'],
            'rdv_status' => ['required','numeric'],
        ]);

        $appointment = Appointment::findOrFail($request->rdv_id);
        $appointment->visited = $request->rdv_status;
        $appointment->save();

        return Redirect::back()->with('success', 'Appointment Updated Successfully!');
    }

	public function all(){
		$appointments = Appointment::all();

		return view('appointment.all', ['appointments' => $appointments]);
	}

    public function al(){
		$appointments = Appointment::all();

		return view('appointment.al', ['appointments' => $appointments]);
	}



    public function destroy($id){

        Appointment::destroy($id);
        return Redirect::route('appointment.all')->with('success', 'Appointment Deleted Successfully!');

    }

    public function destro($id){

        Appointment::destroy($id);
        return Redirect::route('admin.appointment.al')->with('success', 'Appointment Deleted Successfully!');

    }


}
