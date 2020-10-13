<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Prescription;

class PrescriptionController extends Controller
{
    public function index()
    {
        date_default_timezone_set('America/New_York');
        // Get the DOCTOR PATIENTS appointment on the date and checked-in 
        $bookings = Booking::where('date', date('m-d-yy'))->where('status', 1)->where('doctor_id', auth()->user()->id)->get();
        return view('prescription.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Prescription::create($data);
        return redirect()->back()->with('message', 'A prescription was created successfully!');
    }

    public function show($userId, $date)
    {
        $prescription = Prescription::where('user_id', $userId)->where('date', $date)->first();
        return view('prescription.show', compact('prescription'));
    }

    public function showAllPrescriptions()
    {
        $bookings = Prescription::get();
        return view('prescription.all', compact('bookings'));
    }
}
