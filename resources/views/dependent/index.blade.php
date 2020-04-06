@extends('layouts.patient-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <form action="" method="post">
   
                <div class="card">
                    <div class="card-header text-primary font-weight-bold">
                        Patient's Dependent 
                        <a href="{{ route('dependent.create')}}" class="btn p-0 float-right"> <i class="fas fa-user-plus text-primary font-weight-bold" style="font-size:24px;"></i></a>
                    </div>
                    
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
                                    <th>Full Name</th>
                                    <th>Date of Birth</th>
                                    <th>Relationship</th>
                                    <th colspan="2" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($dependents->count() > 0)
                                    @foreach ($dependents as $dependent)
                                    <tr>
                                            <td>{{ $dependent->name }}</td>
                                            <td>{{ $dependent->dob }}</td>
                                            <td>{{ $relationships[$dependent->relationship] }}</td>
                                            <td class="text-center"><a href="{{ route('dependent.edit', ['dependent'=>$dependent]) }}"><i class="fas fa-eye text-primary"></i></td>
                                            <td class="text-center">
                                                <form action="{{ route('dependent.destroy',  $dependent->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn p-0">
                                                        <i class="fas fa-trash-alt text-danger"></i>

                                                    </button>
                                                </form>
                                            </td>
                                        </tr> 
                                    @endforeach                                    
                                @endif


                            </tbody>

                        </table>
                    </div>

                 
                    </div>
                </div>                    


            </form>
        </div>
    </div>
</div>
@endsection