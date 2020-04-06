@extends('layouts.patient-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <form action="{{ route('patient.profile.store') }}" method="post">
                    @foreach ($profile as $item)
                <div class="card-header text-primary font-weight-bold">Patient's Profile</div>
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                            
                            @csrf
                            <input type="hidden" name="patient_id" id="patient_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="profile_id" id="profile_id" value="{{$item->id}}">
                            <div class="form-group row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ Auth::user()->firstname}}" placeholder="FirstName" required autocomplete="off">

                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ Auth::user()->middlename }}" placeholder="MiddleName" required autocomplete="off">

                                    @error('middlename')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ Auth::user()->lastname }}" placeholder="LastName" required autocomplete="off">

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone }}" placeholder="Phone" required autocomplete="off">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') ?? $item->dob ?? '' }}" autocomplete="off">

                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    
                                    <select name="gender" id="" class="form-control @error('gender') is-invalid @enderror" >
                                        <option>Gender</option>
                                        @foreach ($gender as $key => $value)
                                            <option value="{{$key}}" {{ $item->gender != null ? $key == $item->gender ? 'selected' : '' : ''}}>{{$value}}</option>                      
                                        @endforeach

                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    
                                    <select name="marital_status" id="" class="form-control @error('marital_status') is-invalid @enderror" >
                                        
                                        <option>Marital Status</option>
                                        @foreach ($mstatus as $key => $value)
                                            <option value="{{$key}}" {{ $item->marital_status != null ? $key == $item->marital_status ? 'selected' : '' : ''}}>{{$value}}</option>                      
                                        @endforeach
                                    </select>
                                    @error('marital_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    
                                    <select name="religion" id="" class="form-control @error('religion') is-invalid @enderror" >
                                    
                                        <option>Religion</option>
                                        @foreach ($religion as $key => $value)
                                            <option value="{{$key}}" {{ $item->religion != null ? $key == $item->religion ? 'selected' : '' : ''}}>{{$value}}</option>                      
                                        @endforeach
                                    </select>
                                    @error('religion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    
                                    <select name="language" id="" class="form-control @error('language') is-invalid @enderror" >
                                        <option>Language</option>
                                        @foreach ($language as $key => $value)
                                            <option value="{{$key}}" {{ $item->language != null ? $key == $item->language ? 'selected' : '' : ''}}>{{$value}}</option>                      
                                        @endforeach
                                    </select>
                                    @error('language')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input id="qualification" type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" value="{{ old('qualification') ?? $item->qualification ?? ''}}" placeholder="Education Qualification" autocomplete="off">

                                    @error('qualification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ Auth::user()->national_id ?? 'Means of Identification'}}" placeholder="Means of Identification" autocomplete="off">

                                    @error('national_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                              
                            </div> 
                            <div class="form-group row">
                          
                            </div>                       
                        </div>
                        <div class="card-footer text-primary font-weight-bold">Contact Address</div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? $item->address ?? ''}}" placeholder="Home Address" autocomplete="off">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                                <div class="col-sm-6">
                                    <input id="offaddress" type="text" class="form-control @error('offaddress') is-invalid @enderror" name="offaddress" value="{{ old('offaddress') ?? $item->offaddress ?? '' }}" placeholder="Office Address" autocomplete="off">
                                    @error('offaddress')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                             
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') ?? $item->country ?? '' }}" placeholder="Country" autocomplete="off">
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                                <div class="col-sm-4">
                                    
                                    <select name="state" id="" class="form-control @error('state') is-invalid @enderror" >
                                        <option>State</option>
                                        @foreach ($state as $key => $value)
                                            <option value="{{$value}}" {{ $item->state != null ? $value == $item->state ? 'selected' : '' : ''}}>{{$value}}</option>                      
                                        @endforeach
                                    </select>
                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <input id="lga" type="text" class="form-control @error('lga') is-invalid @enderror" name="lga" value="{{ old('lga') ?? $item->lga ?? ''}}" placeholder="L.G.A" autocomplete="off">
                                    @error('lga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                              
                            </div>
                        </div>
                        <div class="card-footer text-primary font-weight-bold">Contact(s) in case of Emergency</div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <input id="emg_name" type="text" class="form-control @error('emg_name') is-invalid @enderror" name="emg_name" value="{{ old('emg_name') ?? $item->emg_name ?? ''}}" placeholder="Contact Name I" autocomplete="off">
                                    @error('emg_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                                <div class="col-sm-4">
                                    <input id="emg_phone" type="text" class="form-control @error('emg_phone') is-invalid @enderror" name="emg_phone" value="{{ old('emg_phone') ?? $item->emg_phone ?? ''}}" placeholder="Phone Number" autocomplete="off">
                                    @error('emg_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                                <div class="col-sm-4">
                                    <select name="relationship" id="" class="form-control @error('relationship') is-invalid @enderror" >
                                        <option>Relationship</option>
                                        @foreach ($relationship as $key => $value)
                                            <option value="{{$key}}" {{ $item->relationship != null ? $key == $item->relationship ? 'selected' : '' : ''}}>{{$value}}</option>                      
                                        @endforeach
                                    </select>
                                
                                    @error('relationship')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                             
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <input id="emg_name1" type="text" class="form-control @error('emg_name1') is-invalid @enderror" name="emg_name1" value="{{ old('emg_name1') ?? $item->emg_name1 ?? ''}}" placeholder="Contact Name II" autocomplete="off">
                                    @error('emg_name1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                                <div class="col-sm-4">
                                    <input id="emg_phone1" type="text" class="form-control @error('emg_phone1') is-invalid @enderror" name="emg_phone1" value="{{ old('emg_phone1') ?? $item->emg_phone1 ?? ''}}" placeholder="Phone Number" autocomplete="off">
                                    @error('emg_phone1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                                <div class="col-sm-4">
                                    <select name="relationship1" id="" class="form-control @error('relationship1') is-invalid @enderror" >
                                        <option>Relationship</option>
                                        @foreach ($relationship as $key => $value)
                                            <option value="{{$key}}" {{ $item->relationship != null ? $key == $item->relationship ? 'selected' : '' : ''}}>{{$value}}</option>                      
                                        @endforeach
                                    </select>
                                
                                    @error('relationship1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                             
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <input id="emg_name2" type="text" class="form-control @error('emg_name2') is-invalid @enderror" name="emg_name2" value="{{ old('emg_name2') ?? $item->emg_name2 ?? '' }}" placeholder="Contact Name III" autocomplete="off">
                                    @error('emg_name2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                                <div class="col-sm-4">
                                    <input id="emg_phone2" type="text" class="form-control @error('emg_phone2') is-invalid @enderror" name="emg_phone2" value="{{ old('emg_phone2') ?? $item->emg_phone2 ?? ''}}" placeholder="Phone Number" autocomplete="off">
                                    @error('emg_phone2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                                <div class="col-sm-4">
                                    <select name="relationship2" id="" class="form-control @error('relationship2') is-invalid @enderror" >                                
                                        <option>Relationship</option>
                                        @foreach ($relationship as $key => $value)
                                            <option value="{{$key}}" {{ $item->relationship != null ? $key == $item->relationship ? 'selected' : '' : ''}}>{{$value}}</option>                      
                                        @endforeach
                                    </select>
                                
                                    @error('relationship2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                             
                            </div>

                        </div>
                        <div class="card-footer text-primary font-weight-bold">Blood Group and Allegeries</div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <select name="blood_group" id="" class="form-control @error('blood_group') is-invalid @enderror" >           
                                        <option>Blood Group</option>
                                        @foreach ($bloodgroup as $key => $value)
                                            <option value="{{$key}}" {{ $item->blood_group != null ? $key == $item->blood_group ? 'selected' : '' : ''}}>{{$value}}</option>                      
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="genotype" id="" class="form-control @error('genotype') is-invalid @enderror" >
                                        <option>Genotype</option>
                                        @foreach ($genotype as $key => $value)
                                            <option value="{{$key}}" {{ $item->genotype != null ? $key == $item->genotype ? 'selected' : '' : ''}}>{{$value}}</option>                      
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <textarea name="env_allergies" id="env_allergies" cols="30" rows="3" class="form-control" placeholder="Environmental Allegery">{{$item->env_allergies}}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <textarea name="drug_allergies" id="drug_allergies" cols="30" rows="3" class="form-control" placeholder="Drug Allegery">{{$item->drug_allergies}}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <textarea name="food_allergies" id="food_allergies" cols="30" rows="3" class="form-control" placeholder="Food Allegery">{{$item->food_allergies}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">
                                Update Profile
                            </button>
                        </div>
                    </div>                    
                    @endforeach
    
                </form>
        </div>
    </div>
</div>
@endsection