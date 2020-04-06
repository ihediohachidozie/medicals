@extends('layouts.inc.header')

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-signup-img"></div>
          <div class="col-lg-7">
            <div class="p-4">
              <div class="text-center">
                <h1 class="h4 text-gray-900 text-uppercase">Hospital Registration</h1>
                <hr>
              </div>
            <form method="POST" action="{{ route('hospital.register.submit') }}">
                @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="off">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="col-sm-6">
                        <input id="othernames" type="text" class="form-control @error('othernames') is-invalid @enderror" name="othernames" value="{{ old('othernames') }}" placeholder="Othernames/Abbreviation" required autocomplete="off">

                        @error('othernames')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}"placeholder="Country" required autocomplete="off">

                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" placeholder="State" required autocomplete="off">
                        @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  <div class="col-md-4">
                    <input id="lga" type="text" class="form-control @error('lga') is-invalid @enderror" name="lga" value="{{ old('lga') }}"  placeholder="LGA" required autocomplete="off">
                    @error('lga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="off">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>  
                      @enderror
                  </div>

                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                      <input id="tin" type="text" class="form-control @error('tin') is-invalid @enderror" name="tin" value="{{ old('tin') }}" placeholder="TAX Number" required autocomplete="off">

                      @error('tin')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>  
                      @enderror
                  </div>
                  <div class="col-md-6">
                     <input id="postal" type="text" class="form-control @error('postal') is-invalid @enderror" name="postal" value="{{ old('postal') }}" placeholder="Postal Code" required autocomplete="off">

                      @error('postal')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Contact Phone I" required autocomplete="off">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="col-sm-6">
                        <input id="contact_phone" type="text" class="form-control @error('contact_phone') is-invalid @enderror" name="contact_phone" value="{{ old('contact_phone') }}" placeholder="Contact Phone II" required autocomplete="off">

                        @error('contact_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="emg_phone1" type="text" class="form-control @error('emg_phone1') is-invalid @enderror" name="emg_phone1" value="{{ old('emg_phone1') }}" placeholder="Emergencey Phone I" required autocomplete="off">

                        @error('emg_phone1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="col-sm-6">
                        <input id="emg_phone2" type="text" class="form-control @error('emg_phone2') is-invalid @enderror" name="emg_phone2" value="{{ old('emg_phone2') }}" placeholder="Emergencey Phone II" required autocomplete="off">

                        @error('emg_phone2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <div class="col-sm-6 mb-sm-0">
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

