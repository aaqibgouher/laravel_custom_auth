@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>
                <div class="panel-body">
                    <p>{{ $user_id }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection