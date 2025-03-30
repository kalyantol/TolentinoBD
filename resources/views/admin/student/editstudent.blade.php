@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{ __('Edit Student') }}</strong></div>
                <div class="card-body">

                    <form action="{{ route('editstudent.store', $student->id )}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">First Name</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"  placeholder="First Name" name="first_name" value="{{$student->first_name}}">
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
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"  placeholder="Last Name" name="last_name" value="{{$student->last_name}}">
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
                            <input type="text" class="form-control @error('student_id') is-invalid @enderror"  placeholder="Student ID" name="student_id" value="{{$student->student_id}}">
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
                                <button type="submit" class="btn btn-success">Edit Student</button>
                            </div>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
