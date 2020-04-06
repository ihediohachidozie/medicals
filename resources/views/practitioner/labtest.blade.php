@extends('layouts.practitioner-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" id="consult">
                <div class="card-header text-primary font-weight-bold">Laboratory Test Request Form - {{$consultancy->patient->firstname.' '.$consultancy->patient->lastname}}</div>

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
                            <div class="col-sm-12">
                                
                                <div class="form-check">
                                    <div class="row">
                                        <label for="" class="font-weight-bold mb-0">Test Sample:</label> 
                                        <div class="col-sm-12">
                                            <div class="form-check-inline mt-0">
                                                <div class="custom-control custom-radio">
                                                    <input name="test_sample" class="custom-control-input" id="urine" type="radio" value="Urine" required>
                                                    <label class="custom-control-label" for="urine">Urine</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline mt-0">
                                                <div class="custom-control custom-radio">
                                                    <input name="test_sample" class="custom-control-input" id="blood" type="radio" value="Blood">
                                                    <label class="custom-control-label" for="blood">Blood</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline mt-0">
                                                <div class="custom-control custom-radio">
                                                    <input name="test_sample" class="custom-control-input" id="stool" type="radio" value="Stool">
                                                    <label class="custom-control-label" for="stool">Stool</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline mt-0">
                                                <div class="custom-control custom-radio">
                                                    <input name="test_sample" class="custom-control-input" id="mri" type="radio" value="MRI">
                                                    <label class="custom-control-label" for="mri">MRI</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline mt-0">
                                                <div class="custom-control custom-radio">
                                                    <input name="test_sample" class="custom-control-input" id="ECG/ETG" type="radio" value="ECG/ETG">
                                                    <label class="custom-control-label" for="ECG/ETG">ECG/ETG</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline mt-0">
                                                <div class="custom-control custom-radio">
                                                    <input name="test_sample" class="custom-control-input" id="C-Scan" type="radio" value="C-Scan">
                                                    <label class="custom-control-label" for="C-Scan">C-Scan</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline mt-0">
                                                <div class="custom-control custom-radio">
                                                    <input name="test_sample" class="custom-control-input" id="White-Blood-Cell" type="radio" value="White-Blood-Cell">
                                                    <label class="custom-control-label" for="White-Blood-Cell">White Blood Cell</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline mt-2">
                               
                                                <div class="custom-control custom-radio">
                                                    <input name="test_sample" class="custom-control-input" id="Red-Blood-Cell" type="radio" value="Red-Blood-Cell">
                                                    <label class="custom-control-label" for="Red-Blood-Cell">Red Blood Cell</label>
                                                </div>
                                            </div>
                                        </div>

                                        </div>

                                </div>
                                <div class="form-check">
                                    <div class="row">
                                        <div class="col-sm-12">

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold">Test Required:</span>
                                    </div>
                                    <textarea name="test_required" id="test_required" cols="10" rows="5" class="form-control" aria-label="With textarea" required></textarea>
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
