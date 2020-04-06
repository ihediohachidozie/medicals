@extends('layouts.practitioner-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" id="consult">
                <div class="card-header text-primary font-weight-bold">Admitted Patient - {{$consultancy->patient->firstname.' '.$consultancy->patient->lastname}}</div>

                <form action="{{route('patients.admission.update', ['consultancy' => $consultancy])}}" method="post" autocomplete="off">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @csrf
                        @method('PUT')
                        <input type="hidden" name="activity" value="doctor">
                        
                        <div class="form-group row">

                            <div class="col-sm-4">
                                <div class="input-group input-group-sm ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Blood Pressure:</span>
                                    </div>
                                    <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $consultancy->bp}}"  disabled>
                                </div>

                            </div>
                            <div class="col-sm-4">

                                <div class="input-group input-group-sm ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Pulse:</span>
                                    </div>
                                    <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $consultancy->pulse}}"  disabled>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="input-group input-group-sm ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Temperature:</span>
                                    </div>
                                    <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $consultancy->temp}}"  disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-white font-weight-bold">&#8451</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Weight:</span>
                                    </div>
                                    <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $consultancy->weight}}" id="weight" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-white font-weight-bold">Kg</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Height:</span>
                                    </div>
                                    <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $consultancy->height}}" id="height"  disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-white font-weight-bold">Cm</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Body Mass Index:</span>
                                    </div>
                                <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="bmi"  disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-primary font-weight-bold">Consulting Section:</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="" class="font-weight-bold">Condition of Patient: </label>
                                <div class="form-check-inline">
                                    <div class="custom-control custom-radio">
                                        <input name="condition" class="custom-control-input" id="customRadio6" type="radio" value="0" {{ $consultancy->condition == 0 ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="customRadio6">Acute</label>
                                    </div>

                                </div>
                                <div class="form-check-inline">
                                    <div class="custom-control custom-radio">
                                        <input name="condition" class="custom-control-input" id="customRadio7" type="radio" value="1"  {{ $consultancy->condition == 1 ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="customRadio7">Chronic</label>
                                    </div>
                                </div>
                                <div class="form-check-inline">
                                    <div class="custom-control custom-radio">
                                        <input name="condition" class="custom-control-input" id="customRadio8" type="radio" value="2"  {{ $consultancy->condition == 2 ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="customRadio8">Pre-exiting</label>
                                    </div>
                                </div>
                                <div class="form-check-inline">
                                    <div class="custom-control custom-radio">
                                        <input name="condition" class="custom-control-input" id="customRadio9" type="radio" value="3"  {{ $consultancy->condition == 3 ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="customRadio9">Injury</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold">Complain:</span>
                                    </div>
                                    <textarea name="complain" id="complain" rows="4" class="form-control" aria-label="With textarea" required>{{ $consultancy->complain }}</textarea>
                                </div>
      
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold">Symptoms:</span>
                                    </div>
                                    <textarea name="symptoms" id="symptoms" rows="4" class="form-control" aria-label="With textarea" required>{{ $consultancy->symptoms }}</textarea>
                                </div>
      
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold">Diagnosis:</span>
                                    </div>
                                    <textarea name="diagnosis" id="diagnosis" rows="4" class="form-control" aria-label="With textarea">{{ $consultancy->diagnosis }}</textarea>
                                </div>
      
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold">Remarks:</span>
                                    </div>
                                    <textarea name="remarks" id="remarks" rows="4" class="form-control" aria-label="With textarea">{{ $consultancy->remarks }}</textarea>
                                </div>
      
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
