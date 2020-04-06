@extends('layouts.practitioner-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-primary font-weight-bold">Patient's Drug Prescriptions</div>

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
                                    <th>Physician</th>
                                    <th>Means of ID</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($pharms->count() > 0)
                                    @foreach ($pharms as $pharm)
                                        <tr>
                                            <td>
                                                {{ $pharm->created_at}}
                                            </td>
                                            <td>{{ App\Practitioner::find($pharm->patient_id)->firstname. ' '. App\Practitioner::find($pharm->patient_id)->lastname}}</td>
                                            <td>
                                                {{ App\Practitioner::find($pharm->doctor_id)->firstname
                                                .' '.
                                                 App\Practitioner::find($pharm->doctor_id)->lastname}}
                                            </td>
                                            <td>{{ App\Practitioner::find($pharm->patient_id)->national_id}}</td>
                                             <td class="text-center"> <a href="{{ route('pharm.drugs.request', $pharm) }}" class="btn btn-primary">Issue Drugs </a> </td>
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
