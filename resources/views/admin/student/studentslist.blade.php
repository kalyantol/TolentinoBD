@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{ __('Student List') }} </strong><a style="float: right;" class="btn btn-primary" href="{{ route('add.student') }}" role="button">Add Student</a></div>

                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                   <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">SL</td>
                            <th scope="col">Name</td>
                            <th scope="col">Name</td>
                            <th scope="col">Class</td>
                            <th scope="col">Section</td>
                            <th scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key=>$row)
                            
                       
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $row->first_name." ".$row->last_name}}</td>
                            <td>{{ $row->student_id}}</td>
                            <td>KG I</td>
                            <td>Mynas</td>
                            <td>
                            <a class="btn btn-primary" href="{{ route('viewstudent',Crypt::encryptString($row->id)) }}" role="button">View</a>
                            <a class="btn btn-warning" href="{{ route('editstudent',Crypt::encryptString($row->id)) }}" role="button">Edit</a>
                            <a class="btn btn-danger" href="{{ route('deletestudent',Crypt::encryptString($row->id)) }}" role="button">Delete</a>
                            </td>
                            
                        </tr>
                        @endforeach
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
