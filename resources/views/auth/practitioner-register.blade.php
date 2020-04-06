@extends('layouts.inc.header')

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-signup-img"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 text-uppercase">Practitoner Registration</h1>
                <hr>
              </div>
            <form method="POST" action="{{ route('practitioner.register.submit') }}">
                @csrf
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" placeholder="FirstName" required autocomplete="off">

                        @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="col-sm-4">
                        <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}" placeholder="MiddleName" required autocomplete="off">

                        @error('middlename')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="col-sm-4">
                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" placeholder="LastName" required autocomplete="off">

                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="off">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone" required autocomplete="off">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                </div>
                <input id="national_id" type="hidden" value="   " name="national_id" >
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                     
                        <select name="profession" id="" class="form-control @error('profession') is-invalid @enderror" required>
                            <option>Profession</option>
                            <option value="0">Nurse</option>
                            <option value="1">Physician</option>
                            <option value="2">Lab. Tech</option>
                            <option value="3">Pharmacy</option>
                        </select>

                        @error('profession')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="col-sm-4">
                        <input id="license" type="text" class="form-control @error('license') is-invalid @enderror" name="license" value="{{ old('license') }}" placeholder="License" required autocomplete="off">

                        @error('license')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="col-sm-4">
                        
                        <select name="specialty" id="" class="form-control @error('specialty') is-invalid @enderror" required>
                            <option>Specialty</option>
                            <option value="0">Family Medicine</option>
                            <option value="1">Emergency Medicine</option>
                            <option value="2">General Surgery</option>
                            <option value="3">General Practitoner</option>
                            <option value="4">Preventive Healthcare</option>
                        </select>
                        @error('specialty')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repeat Password" required autocomplete="new-password">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="">
                <a class="small" href="#">Forgot Password?</a>
                <a class="small float-right" href="/">Already have an account? Login!</a>
              </div>
             </div>
          </div>
        </div>
      </div>
    </div>

  </div>
    
</body>

