@csrf
<div class="form-group row">
    <div class="col-sm-4 mb-3 mb-sm-0">
        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname')}}" placeholder="FirstName" required autocomplete="off">

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
    <div class="col-md-12">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="off">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone" required autocomplete="off">

        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-sm-6">
        <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id') }}" placeholder="NIN/Driver's License/Voter's Card" required autocomplete="off">

        @error('national_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
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
