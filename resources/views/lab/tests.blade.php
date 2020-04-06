@extends('layouts.practitioner-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-primary font-weight-bold">Patient's Laboratory Requests</div>

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
                                @if ($labtests->count() > 0)
                                    @foreach ($labtests as $labtest)
                                        <tr>
                                            <td>
                                                {{ $labtest->created_at}}
                                            </td>
                                            <td>{{ App\Patient::find($labtest->patient_id)->firstname. ' '. App\Patient::find($labtest->patient_id)->lastname}}</td>
                                            <td>
                                                {{ App\Practitioner::find($labtest->doctor_id)->firstname
                                                .' '.
                                                 App\Practitioner::find($labtest->doctor_id)->lastname}}
                                            </td>
                                            <td>{{ App\Patient::find($labtest->patient_id)->national_id}}</td>
                                             <td class="text-center"> <a href="{{ route('test.patient', $labtest) }}" class="btn btn-primary">Conduct Test </a> </td>
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
