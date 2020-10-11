@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h4>Doctor Information</h4>
                        <img src="{{ asset('images') }}/{{ $user->image }}" width="100px" style="border-radius: 50%;">
                        <br>
                        <p class="lead"> Name: {{ ucfirst($user->name) }}</p>
                        <p class="lead"> Degree: {{ $user->education }}</p>
                        <p class="lead"> Specialist: {{ $user->department }}</p>
                    </div>
                </div>

            </div>
            <div class="col-md-9">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach

                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif

                @if (Session::has('errMessage'))
                    <div class="alert alert-danger">
                        {{ Session::get('errMessage') }}
                    </div>
                @endif

                <form action="{{ route('book.appointment') }}" method="post">@csrf
                    <div class="card">
                        <div class="card-header lead">Appointment Date: {{ $date }}</div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($times as $time)
                                    <div class="col-md-3">
                                        <label class="btn btn-outline-primary btn-block">
                                            <input type="radio" name="time" value="{{ $time->time }}">
                                            <span>{{ $time->time }}</span>
                                        </label>
                                    </div>
                                    {{-- pass props to book app
                                    --}}
                                    <input type="hidden" name="doctorId" value="{{ $doctor_id }}">
                                    <input type="hidden" name="appointmentId" value="{{ $time->appointment_id }}">
                                    <input type="hidden" name="date" value="{{ $date }}">
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        @if (Auth::check())
                            <button type="submit" class="btn btn-primary">Book Appointment</button>
                        @else
                            <p>Please login to make an appointment</p>
                            <a class="btn btn-success" href="/register">Register</a>
                            <a class="btn btn-primary" href="/login">Login</a>
                        @endif
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
