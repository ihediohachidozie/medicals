<div class="container">
    <p>Dear {{ $fullname}},</p>
    <p>Kindly be informed that your account have been successfully created on Online Patient Medical Recording System. <br>
       Below are your login details:
    </p>
    <p>
        Username: {{$email}} or {{$phone}} <br>
        Password: {{ $password }}
    </p>
    <p>Click <a href="#">here</a> to login</p>
    <br>
    <p>Regards</p>  
    <p>Admin</p>
    <p>{{Auth::user()->name}}</p>

    
</div>