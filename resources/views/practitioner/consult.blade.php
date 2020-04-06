@extends('layouts.practitioner-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-primary font-weight-bold">Patient's Booking Appointments - Doctor</div>

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
                                    <th>Date / Time</th>
                                    <th>Patient</th>
                                    <th>Doctor</th>
                                    <th>Means of ID</th>
                                    <th colspan="4" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($consults->count() > 0)
                                    @foreach ($consults as $consult)
                                        <tr>
                                            <td>
                                                {{ $consult->created_at}}
                                            </td>
                                            <td>{{ $consult->patient->firstname}} {{ ' '}}{{ $consult->patient->lastname}}</td>
                                            <td>
                                                {{ App\Practitioner::find($consult->doctor_id)->firstname}}
                                                {{' '}}
                                                {{ App\Practitioner::find($consult->doctor_id)->lastname}}
                                            </td>
                                            <td>{{ $consult->patient->national_id}}</td>
                                             <td class="text-center"> <a href="{{ route('patients.doctor.consult', ['consultancy'=>$consult]) }}" class="btn btn-primary btn-sm">Consult </a> </td>
                                             <td class="text-center"> <a href="{{ route('patients.lab', ['consultancy'=>$consult]) }}" class="btn btn-primary btn-sm">Lab Test</a> </td>
                                             <td class="text-center"> <a href="{{ route('patients.pharm', ['consultancy'=>$consult]) }}" class="btn btn-primary btn-sm">Pharmacy</a> </td>
                                             <td class="text-center"> <a href="{{ route('patient.discharge', ['consultancy'=>$consult]) }}" class="btn btn-danger btn-sm">Discharge </a> </td>



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
