@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form method="post">
                        {{ csrf_field() }}
                        @if($error)
                        <div class="alert alert-danger">{{ $error }}</div>
                        @endif
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <input type="submit" value="Login" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection