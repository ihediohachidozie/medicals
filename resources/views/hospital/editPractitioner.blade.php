@extends('layouts.hospital-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Edit Practitioners</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($practitioner as $item)
                    <form action="{{ route('hospital.update.practitioner', $item->id) }}" method="post">
                            @include('hospital.editform')
                            @method('PUT')
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Update Practitioner
                            </button>
                        </form>
                    @endforeach
 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection