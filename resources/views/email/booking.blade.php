<div class="container">
    <p>Dear {{ Auth::user()->firstname}},</p>
    <p>Kindly be informed that you have successfully booked an appointment with a doctor on Online Patient Medical Recording System. <br>
       The following are the details
    </p>
    <p>
        Doctor's Name : {{$doctor->firstname}} {{ ' '}} {{$doctor->lastname }} <br>
        Phone: {{ $doctor->phone}}
    </p>

    <br>
    <p>Regards</p>  
    <p>Admin</p>
    <p>{{$doctor->hospital->name}}</p>

    
</div>