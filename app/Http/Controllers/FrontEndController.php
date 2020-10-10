<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Time;
use App\User;

class FrontEndController extends Controller
{
    public function index(Request $request)

    {
        // Set timezone
        date_default_timezone_set('America/New_York');
        // If there is set date, find the doctors
        if (request('date')) {
            $formatDate = date('m-d-yy', strtotime(request('date')));
            $doctors = Appointment::where('date', $formatDate)->get();
            return view('welcome', compact('doctors', 'formatDate'));
        };
        // Return all doctors avalable for today to the welcome page
        $doctors = Appointment::where('date', date('m-d-yy'))->get();
        return view('welcome', compact('doctors'));
    }

    public function show($doctorId, $date)
    {
        $appointment = Appointment::where('user_id', $doctorId)->where('date', $date)->first();
        $times = Time::where('appointment_id', $appointment->id)->where('status', 0)->get();
        $user = User::where('id', $doctorId)->first();
        return view('appointment', compact('times', 'date', 'user'));
    }
}
