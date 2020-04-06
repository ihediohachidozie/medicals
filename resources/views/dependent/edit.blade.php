@extends('layouts.patient-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('dependent.update', ['dependent' => $dependent])}}" method="post">
   
                <div class="card">
                    <div class="card-header text-primary font-weight-bold">Edit Dependant</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        @include('dependent.form')
                        @method('PUT')
                        <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
                 
                    </div>
                </div>                    


            </form>
        </div>
    </div>
</div>
@endsection