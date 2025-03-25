@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Name: </td>
                                <td>{{Auth::user()->name}}</td>                            
                            </tr>                            
                            <tr>
                                <td scope="row">2</td>
                                <td>Email: </td>
                                <td>{{Auth::user()->email}}</td>                            
                            </tr>                            
                            <tr>
                                <td scope="row">3</td>
                                <td>Created Date & Time: </td>
                                <td>{{Auth::user()->created_at}}</td>                            
                            </tr>                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
