@extends('layouts.practitioner-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">

            <div class="card">
                <div class="card-header text-primary font-weight-bold">Medical Care Services History</div>

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
                                    <th>Date</th>
                                    <th>Hospital</th>
                                    <th>Phone</th>
                                    <th>Doctor</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($consults->count() > 0)
                                    @foreach ($consults as $consult)
                                        <tr>
                                            <td>{{ $consult->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                {{ App\Practitioner::find($consult->doctor_id)->hospital->name}}
                                            </td>
                                            <td>
                                                {{ App\Practitioner::find($consult->doctor_id)->hospital->phone}}
                                            </td>
                                            <td>
                                                {{ 
                                                App\Practitioner::find($consult->doctor_id)->firstname .' '.
                                                App\Practitioner::find($consult->doctor_id)->lastname
                                                }} 
                                            </td>
                                             <td class="text-center"> <a href="{{ route('practitioner.medhistory', $consult->id) }}" class="btn btn-primary">View Record </a> </td>
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