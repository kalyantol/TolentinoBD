@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{ __('Student Details') }}</strong></div>
                <div class="card-body">                 
                    <table class="table table-hover table-bordered">
                        
                        <tbody>
                            <tr>
                                <td class="text-end">Student Name:</td>
                                <td>{{ $student->first_name." ".$student->last_name }}</td>                                
                            </tr>
                            <tr>
                                <td class="text-end">Student ID:</td>
                                <td>{{ $student->student_id }}</td>
                            </tr>                            
                            <tr>
                                <td class="text-end">Class:</td>
                                <td>{{ $student->class_name }}</td>
                            </tr>                            
                            <tr>
                                <td class="text-end">Sectiob:</td>
                                <td>{{ $student->section_name }}</td>
                            </tr>                            
                            <tr>
                                <td class="text-end">Date of Birth:</td>
                                <td>{{ $student->dob }}</td>
                            </tr>                            
                            <tr>
                                <td class="text-end">Date of Admission:</td>
                                <td>{{ $student->doa }}</td>
                            </tr>                            
                            <tr>
                                <td class="text-end">Gender:</td>
                                @if ($student->sex=='m')
                                <td>Male</td>                                    
                                @elseif ($student->sex=='f')
                                <td>Female</td>
                                @else
                                <td>Empty</td>
                                @endif                                                        
                            </tr>
                            <tr>
                                <td class="text-end">Father Name:</td>
                                <td>{{ $student->father_name }}</td>
                            </tr>
                            <tr>
                                <td class="text-end">Mother Name:</td>
                                <td>{{ $student->mother_name }}</td>
                            </tr>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
