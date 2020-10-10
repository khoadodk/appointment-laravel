@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6"><img src="/banners/homeBanner.jpg" alt="home" class="img-fluid"></div>
            <div class="col-md-6">
                <h2>Book your appointment</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.</p>
                <div class="mt-5">
                    <a href="{{ url('/register') }}"> <button class="btn btn-primary">Register as Patient</button></a>
                    <a href="{{ url('/login') }}"><button class="btn btn-success">Login</button></a>
                </div>
            </div>
        </div>

        {{-- Input --}}
        <form action="{{ url('/') }}" method="GET">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">Find Doctors</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" name='date' id="datepicker" class='form-control'>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit">Go</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        {{-- Display doctors --}}
        <div class="card">
            <div class="card-body">
                <div class="card-header">List of Doctors Available for @isset($formatDate) {{ $formatDate }}
                    @endisset
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Expertise</th>
                                <th>Book</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctors as $doctor)
                                <tr>
                                    <th scope="row">1</th>
                                    <td><img src="{{ asset('images') }}/{{ $doctor->doctor->image }}" alt="doctor photo"
                                            width="100px"></td>
                                    <td>{{ $doctor->doctor->name }}</td>
                                    <td>{{ $doctor->doctor->department }}</td>
                                    <td>
                                        <a href="{{ route('create.appointment', [$doctor->user_id, $doctor->date]) }}"><button
                                                class="btn btn-primary">Appointment</button></a>
                                    </td>
                                </tr>
                            @empty
                                <td>No doctors available</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection
