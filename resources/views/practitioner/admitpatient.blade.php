@extends('layouts.practitioner-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-primary font-weight-bold">Patient Admission - {{$consultancy->patient->firstname.' '.$consultancy->patient->lastname}}</div>

                <div class="card-body" id="consult">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('patients.admission.update', ['consultancy' => $consultancy])}}" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="activity" value="nurse">
                        <input type="hidden" name="nurse_id" value={{Auth::user()->id}}>
                        <div class="form-group row">

                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Blood Pressure:</span>
                                    </div>
                                    <input type="text" name="bp" id="bp" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ old('bp')}}"  required>
                                </div>

                            </div>
                            <div class="col-sm-4">

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Pulse:</span>
                                    </div>
                                    <input type="text" name="pulse" id="pulse" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ old('pulse')}}"  required>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Temperature:</span>
                                    </div>
                                    <input type="text" name="temp" id="temp" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ old('temp')}}"  required>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-white font-weight-bold">&#8451</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Weight:</span>
                                    </div>
                                    <input type="text" name="weight" id="weight" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ old('weight')}}" v-model="weight"  required>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-white font-weight-bold">Kg</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Height:</span>
                                    </div>
                                    <input type="text" name="height" id="height" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ old('height')}}" v-model="height" @blur="onBMI()" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-white font-weight-bold">Cm</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Body Mass Index:</span>
                                    </div>
                                <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm"  v-model="bmi"  disabled>
                                </div>
                               
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user">
                            Admit Patient
                        </button>
                        <a href="{{route('patients.bookings')}}" class="btn btn-success btn-user float-right">Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/bmi.js')}}"></script>
@endsection
