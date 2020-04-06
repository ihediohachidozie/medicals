@extends('layouts.hospital-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">List of Practitioners</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>License</th>
                                    <th>Fistname</th>
                                    <th>Lastname</th>
                                    <th colspan="2" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($practitioners as $practitioner)
                                   <tr>
                                        <td>{{ $practitioner->license }}</td>
                                        <td>{{ $practitioner->firstname }}</td>
                                        <td>{{ $practitioner->lastname }}</td>
                                        <td class="text-center"><a href="{{ route('hospital.edit.practitioner', $practitioner->id) }}"><i class="fas fa-eye text-primary"></i></td>
                                        <td class="text-center">
                                            <form action="{{ route('hospital.delete.practitioner', $practitioner->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn p-0">
                                                    <i class="fas fa-trash-alt text-danger"></i>

                                                </button>
                                            </form>
                                        </td>
                                    </tr> 
                                @endforeach

                            </tbody>

                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection