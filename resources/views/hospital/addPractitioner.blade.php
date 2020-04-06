@extends('layouts.hospital-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Add Practitioners</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('hospital.store.practitioner') }}" method="post">
                        @include('hospital.form')
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Create Practitioner
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection