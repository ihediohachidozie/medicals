@extends('layouts.patient-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{route('dependent.store')}}" method="post">
   
                <div class="card">
                    <div class="card-header text-primary font-weight-bold">Add Dependant</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        @include('dependent.form')
                        <button type="submit" class="btn btn-primary btn-user btn-block">Create</button>
                    </div>
                </div>                    


            </form>
        </div>
    </div>
</div>
@endsection