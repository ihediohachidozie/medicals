@extends('layouts.patient-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">

            <div class="card">
                <div class="card-header text-primary font-weight-bold">Medical Care Services - Booking Doctor's Appointment</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="example" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Profession</th>
                                    <th>Specialty</th>
                                    <th>Contact Number</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($doctors->count() > 0)
                                    @foreach ($doctors as $doctor)
                                        <tr>
                                            <td>
                                                {{ $doctor->firstname}} {{' '}}{{ $doctor->lastname}} 
                                            </td>
                                            <td>{{ $profession[$doctor->profession] }}</td>
                                            <td>{{$doctor->specialty}}</td>
                                            <td>{{$doctor->phone }}</td>
                                             <td class="text-center"> <a href="{{route('patient.doctor', $doctor->id)}}" class="btn btn-primary">Book Appointment</a> </td>
                                        </tr>
                                    @endforeach
                                @endif 

                            </tbody>

                        </table>
                    </div>

                    
            
                </div>


            </div>                    

        </div>
    </div>
</div>
@endsection