<div class="container">
    <p>Dear {{ $doctor->firstname}},</p>
    <p>Kindly be informed that a patient has successfully booked an appointment with a you on Online Patient Medical Recording System. <br>
       The following are the details
    </p>
    <p>
        Doctor's Name : {{Auth::user()->firstname}} {{ ' '}} {{Auth::user()->lastname }} <br>
        Email: {{ Auth::user()->email}} <br>
        Phone: {{ Auth::user()->phone}}

    </p>

    <br>
    <p>Regards</p>  
    <p>Admin</p>
    <p>{{$doctor->hospital->name}}</p>

    
</div>