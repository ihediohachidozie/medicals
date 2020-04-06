@extends('layouts.patient-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">

            <div class="card">
                <div class="card-header text-primary font-weight-bold">Medical Care Services - Booking Appointment</div>

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
                                    <th>Hospital</th>
                                    <th>State</th>
                                    <th>LGA</th>
                                    <th>Contact Number</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($hospitals->count() > 0)
                                    @foreach ($hospitals as $hospital)
                                        <tr>
                                            <td>
                                                {{ $hospital->name}}
                                            </td>
                                            <td>{{ $hospital->state}}</td>
                                            <td>{{ $hospital->lga }}</td>
                                            <td>{{$hospital->phone }}</td>
                                             <td class="text-center"> <a href="{{route('patient.hospital', $hospital->id)}}" class="btn btn-primary">View {{$num}} Doctor(s) </a> </td>
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