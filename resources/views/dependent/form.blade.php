    @csrf
    <input type="hidden" name="patient_id" id="patient_id" value="{{Auth::user()->id}}">
    <div class="form-group row">
        <div class="col-sm mb-3 mb-sm-0">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $dependent->name}}" placeholder="Full Name" required autocomplete="off">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md">
            <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') ?? $dependent->dob}}" required >

            @error('dob')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">

        <div class="col-sm">
            <select name="relationship" id="" class="form-control @error('relationship') is-invalid @enderror" required>
                <option value="">Relationship</option>
                @foreach ($relationships as $key => $value)
                    <option value="{{$key}}" {{ $dependent->relationship != null ? $key == $dependent->relationship ? 'selected' : '' : ''}}>{{$value}}</option>                      
                @endforeach
            </select>
        
            @error('relationship')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>                             
    </div>