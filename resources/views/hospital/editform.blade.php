    @csrf
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $item->firstname}}" placeholder="FirstName" required autocomplete="off">

            @error('firstname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-4">
            <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{$item->middlename }}" placeholder="MiddleName" required autocomplete="off">

            @error('middlename')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-4">
            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $item->lastname }}" placeholder="LastName" required autocomplete="off">

            @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $item->email }}" placeholder="Email Address" required autocomplete="off">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $item->phone }}" placeholder="Phone" required autocomplete="off">

            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-6">
            <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ $item->national_id }}" placeholder="NIN/Driver's License/Voter's Card" required autocomplete="off">

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
                <option>Choose...</option>
                @foreach ($profession as $key => $value)
                    <option value="{{$key}}" {{ $item->profession != null ? $key == $item->profession ? 'selected' : '' : ''}}>{{$value}}</option>                      
                @endforeach
            </select>

            @error('profession')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-4">
            <input id="license" type="text" class="form-control @error('license') is-invalid @enderror" name="license" value="{{ $item->license }}" placeholder="License" required autocomplete="off">

            @error('license')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-4">
            
            <select name="specialty" id="" class="form-control @error('specialty') is-invalid @enderror" required>
                <option>Choose...</option>
                @foreach ($specialty as $key => $value)
                    <option value="{{$key}}" {{ $item->specialty != null ? $key == $item->specialty ? 'selected' : '' : ''}}>{{$value}}</option>                      
                @endforeach
            </select>
            @error('specialty')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


