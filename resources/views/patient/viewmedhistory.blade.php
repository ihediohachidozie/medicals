@extends('layouts.patient-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" id="consult">
                <div class="card-header text-primary font-weight-bold">Patient Medical History - {{$consults[0]->patient->firstname.' '.$consults[0]->patient->lastname}}</div>

                <div class="card-body">
            
                    <div class="form-group row">

                        <div class="col-sm-4">
                            <div class="input-group input-group-sm ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Blood Pressure:</span>
                                </div>
                                <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $consults[0]->bp}}"  disabled>
                            </div>

                        </div>
                        <div class="col-sm-4">

                            <div class="input-group input-group-sm ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Pulse:</span>
                                </div>
                                <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $consults[0]->pulse}}"  disabled>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="input-group input-group-sm ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Temperature:</span>
                                </div>
                                <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $consults[0]->temp}}"  disabled>
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
                                <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $consults[0]->weight}}" id="weight" disabled>
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
                                <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $consults[0]->height}}" id="height"  disabled>
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
                                    <input name="condition" class="custom-control-input" id="customRadio6" type="radio" value="0" {{ $consults[0]->condition == 0 ? 'checked' : ''}} disabled>
                                    <label class="custom-control-label" for="customRadio6">Acute</label>
                                </div>

                            </div>
                            <div class="form-check-inline">
                                <div class="custom-control custom-radio">
                                    <input name="condition" class="custom-control-input" id="customRadio7" type="radio" value="1"  {{ $consults[0]->condition == 1 ? 'checked' : ''}} disabled>
                                    <label class="custom-control-label" for="customRadio7">Chronic</label>
                                </div>
                            </div>
                            <div class="form-check-inline">
                                <div class="custom-control custom-radio">
                                    <input name="condition" class="custom-control-input" id="customRadio8" type="radio" value="2"  {{ $consults[0]->condition == 2 ? 'checked' : ''}} disabled>
                                    <label class="custom-control-label" for="customRadio8">Pre-exiting</label>
                                </div>
                            </div>
                            <div class="form-check-inline">
                                <div class="custom-control custom-radio">
                                    <input name="condition" class="custom-control-input" id="customRadio9" type="radio" value="3"  {{ $consults[0]->condition == 3 ? 'checked' : ''}} disabled>
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
                                <textarea name="complain" id="complain" rows="4" class="form-control" aria-label="With textarea"  disabled>{{ $consults[0]->complain }}</textarea>
                            </div>
    
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark text-white font-weight-bold">Symptoms:</span>
                                </div>
                                <textarea name="symptoms" id="symptoms" rows="4" class="form-control" aria-label="With textarea"  disabled>{{ $consults[0]->symptoms }}</textarea>
                            </div>
    
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark text-white font-weight-bold">Diagnosis:</span>
                                </div>
                                <textarea name="diagnosis" id="diagnosis" rows="4" class="form-control" aria-label="With textarea" disabled>{{ $consults[0]->diagnosis }}</textarea>
                            </div>
    
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark text-white font-weight-bold">Remarks:</span>
                                </div>
                                <textarea name="remarks" id="remarks" rows="4" class="form-control" aria-label="With textarea" disabled>{{ $consults[0]->remarks }}</textarea>
                            </div>
    
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Test Sample</th>
                                    <th>Test Required</th>
                                    <th>Test Result</th>
                                    <th>Lab. Tech.</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($labtests->all())
                                    @foreach ($labtests as $labtest)
                                        <tr>
                                            <td>{{ $labtest->test_sample }}</td>
                                            <td> {{ $labtest->test_required }}</td>
                                            <td> {{ $labtest->test_result }}</td>
                                            <td> {{ $labtest->lab_tech_id }}</td>
                                        </tr>
                                    @endforeach

                                    

                                @endif
                            </tbody>
                        </table>
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
                     <a href="{{route('patient.history')}}" class="btn btn-success btn-user float-right">Back</a>
                </div>


            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/bmi.js')}}"></script>
@endsection
