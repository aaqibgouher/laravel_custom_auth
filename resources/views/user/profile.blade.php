@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                <div class="panel-body">
                    <p><b>First Name: </b>{{ $user->first_name }}</p>
                    <p><b>Last Name: </b>{{ $user->last_name }}</p>
                    <p><b>Email: </b>{{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection