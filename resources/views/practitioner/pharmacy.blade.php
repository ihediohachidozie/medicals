@extends('layouts.practitioner-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" id="consult">
                <div class="card-header text-primary font-weight-bold">Drug Prescription Form - {{$consultancy->patient->firstname.' '.$consultancy->patient->lastname}}</div>

                <form action="{{route('patients.admission.update', ['consultancy' => $consultancy])}}" method="post" autocomplete="off">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @csrf
                    @method('PUT') 
                    <input type="hidden" name="activity" value="doctor">
     
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold">Prescription:</span>
                                    </div>
                                    <textarea name="prescription" id="prescription" rows="5" class="form-control" aria-label="With textarea">{{ '' }}</textarea>
                                </div>
      
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Prescriptions</th>
                                        <th>Drugs Issued</th>
                                        <th>Pharmacist</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pharms->all())
                                        @foreach ($pharms as $pharm)
                                            <tr>
                                                <td>{{ $pharm->prescription }}</td>
                                                <td> {{ $pharm->drugs }}</td>
                                                <td> {{ App\Practitioner::find($pharm->pharmacist)->firstname.' '.App\Practitioner::find($pharm->pharmacist)->lastname ?? 'N/A'}}</td>

                                            </tr>
                                        @endforeach

                                        

                                    @endif
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user">
                            Save
                        </button>
                        <a href="{{route('patients.consult')}}" class="btn btn-success btn-user float-right">Back</a>
                    </div>


            
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/bmi.js')}}"></script>
@endsection
