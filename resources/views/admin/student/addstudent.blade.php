@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{ __('Add Student') }}</strong> <a style="float: right;" class="btn btn-primary" href="{{ route('student.list') }}" role="button">Student List</a></div>

                <div class="card-body">                 
                <form action="{{ route('add.student.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"  placeholder="First Name" name="first_name" value="{{old('first_name')}}">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"  placeholder="Last Name" name="last_name" value="{{old('last_name')}}">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Student ID</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control @error('student_id') is-invalid @enderror"  placeholder="Student ID" name="student_id" value="{{old('student_id')}}">
                                @error('student_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div><br>
                    </div>
                    <br>
                    <div class="form-group row">
                        <div class="col-sm-10 text-center">
                            <button type="submit" class="btn btn-success">Add Student</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
