<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>OPMRS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="assets/welpg/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        
        <link href="assets/welpg/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="assets/welpg/css/agency.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <style type="text/css">
            .login-form {
                width: 240px;
                margin-left: 0px;
                margin-right: 0px;
                
            }
            .bg {
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                opacity: 90%;
                
            }
            .login-form form {
                margin-bottom: 5px;
                
                padding: 20px;
            }
            .login-form h2 {
                margin: 0 0 15px;
                font-size: 20px;
                font-weight: bold;
                color: black;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
        </style>


    </head>
    <body id="page-top">
    <!-- Navigation -->


        <!-- Header -->
        <header class="masthead">
            <div class="container-fluid">
                <div class="row pull-right ">
                    <!-- Patient's login section -->
                    <div class="col-sm-4 bg">
                        <div class="login-form text-center">
                            <form action="{{ route('patient.login.submit') }}" method="post" autocomplete="off">
                                <h2 class="text-center">Patient's Login</h2>  
                                @csrf  
                                <div class="form-group">
                                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Enter Phone Number..." >
                                    
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" >
                                    
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Log in</button>
                                </div>
                                <div class="clearfix">
                                
                                    <a href="#" class="text-center">Forgot Password?</a>
                                </div>        
                            </form>
                            <p class="text-center"><a href="{{ route('patient.register') }}" class="btn btn-success btn-block">Create an Account</a></p>
                        </div>
                    </div>
                    <!-- Practitioner's login section -->
                    <div class="col-sm-4 bg">
                        <div class="login-form text-center">
                            <form action="{{ route('practitioner.login.submit') }}" method="post" autocomplete="off">
                                <h2 class="text-center">Practitioner's Login </h2> 
                                @csrf
     
                                <div class="form-group">
                                    <input id="username" type="username" class="form-control @error('username1') is-invalid @enderror" name="username1" value="{{ old('username1') }}" placeholder="Enter Phone Number..." >
                                    
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password1') is-invalid @enderror" name="password1" placeholder="Password"  >
                                    
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Log in</button>
                                </div>
                                <div class="clearfix">
                                
                                    <a href="#" class="text-center">Forgot Password?</a>
                                </div>        
                            </form>
                            <p class="text-center"><a href="{{ route('practitioner.register') }}" class="btn btn-success btn-block">Create an Account</a></p>
                        </div>
                    </div>
                    <!-- Hospital's login section -->
                    <div class="col-sm-4 bg">
                        <div class="login-form text-center">
                            <form action="{{ route('hospital.login.submit') }}" method="post" autocomplete="off">
                                <h2 class="text-center">Hospital Login</h2>   
                                @csrf
  
                                <div class="form-group">
                                    <input id="username" type="username" class="form-control @error('username2') is-invalid @enderror" name="username2" value="{{ old('username2') }}" placeholder="Enter Phone Number..." >
                                    
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password2') is-invalid @enderror" name="password2" placeholder="Password" >
                                    
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Log in</button>
                                </div>
                                <div class="clearfix">
                                
                                    <a href="#" class="text-center">Forgot Password?</a>
                                </div>        
                            </form>
                            <p class="text-center"><a href="{{ route('hospital.register') }}" class="btn btn-success btn-block">Create an Account</a></p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="intro-text">
                    <div class="intro-lead-in">Welcome To</div>
                    <div class="intro-heading">Online Patient Medical Recording System</div>
                    <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" data-toggle="modal" data-target="#myModal">Tell Me More</a>
                </div>
            </div>
        </header>

        <!-- The Modal -->
        <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">About the Student</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <table class="table table-striped">
                    <tr>
                        <td>Name:</td><td>Miss Eunice Charles</td>
                    </tr>
                    <tr>
                        <td>Reg No:</td><td>15/095244110</td>
                    </tr>

                </table>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <span class="copyright text-danger font-weight-bold">OPMRS &copy; {{date('Y')}}</span>
                </div>

            </div>
            </div>
        </footer>



        <!-- Bootstrap core JavaScript -->
        <script src="assets/welpg/vendor/jquery/jquery.min.js"></script>
        <script src="assets/welpg/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="assets/welpg/vendor/jquery/easing/jquery.easing.min.js"></script>

        <!-- Contact form JavaScript -->
     
      

        <!-- Custom scripts for this template -->
        <script src="assets/js/agency.min.js"></script>
    </body>
</html>
