@extends('layouts.inc.header')


<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-img">
                <img src="{{ asset('theme/img/sign-in.jpg') }}" alt="" srcset="">
              </div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 text-uppercase">Practitioner's Login</h1>
                      <hr>
                    </div>
                    <form class="user form-prevent-multiple-submits" method="POST" action="{{ route('practitioner.login.submit') }}">
                      @csrf
                      @if (session('status'))
                        <div class="alert alert-danger fade show" role="alert">
                              {{ session('status') }}
                        </div>
                          
                      @endif
                      <div class="form-group">
                        <div class="col-md">
                            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Enter Phone Number..." required autocomplete="email" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>  
                            @enderror
                        </div>
                      </div>
                      <div class="form-group">
                            <div class="col-md">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" class="custom-control-input" id="customCheck">
                          <label class="custom-control-label" for="customCheck">Remember Me</label>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-user btn-block button-prevent-multiple-submits" >
                        Login
                      </button>
                    </form>
                    <hr>
                    <div class="">
                      <a class="small" href="#">Forgot Password?</a>
                      <a class="small float-right" href="{{route('practitioner.register')}}">Create an Account!</a>
                    </div>
                    <div class="text-center">
                      <a class="small" href="/">Back to Home</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

