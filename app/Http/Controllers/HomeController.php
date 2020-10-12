<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
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
        // redirect to dashboard if user is admin or doctor
        if (Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'doctor') {
            return redirect()->to('/dashboard');
        };
        return view('home');
    }
}
