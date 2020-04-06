  @extends('layouts.practitioner-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" id="consult">
                <div class="card-header text-primary font-weight-bold">Patient Drug Requests Form </div>

                <form action="{{route('pharm.drugs.submit', $pharmacy[0]->id)}}" method="post" autocomplete="off">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @csrf
                    @method('PUT')
              
                    
     
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Patient:</span>
                                    </div>
                                    <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{App\Patient::find($pharmacy[0]->patient_id)->firstname .' '.App\Patient::find($pharmacy[0]->patient_id)->lastname}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Doctor:</span>
                                    </div>
                                    <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{App\Practitioner::find($pharmacy[0]->doctor_id)->firstname .' '.App\Practitioner::find($pharmacy[0]->doctor_id)->lastname}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-6">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Doctor' Phone:</span>
                                    </div>
                                    <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{App\Practitioner::find($pharmacy[0]->doctor_id)->phone}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold">Prescriptions:</span>
                                    </div>
                                    <textarea name="prescription" id="prescription" cols="10" class="form-control" aria-label="With textarea" disabled>{{$pharmacy[0]->prescription}}</textarea>
                                </div>
                                
                            </div>

                        </div>                      
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white font-weight-bold">Drugs:</span>
                                    </div>
                                    <textarea name="drugs" id="drugs" cols="10" class="form-control" aria-label="With textarea" required></textarea>
                                </div>
                                
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-user">
                            Save
                        </button>
                        <a href="{{route('pharm.prescriptions')}}" class="btn btn-success btn-user float-right">Back</a>
                    </div>


            
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/bmi.js')}}"></script>
@endsection
