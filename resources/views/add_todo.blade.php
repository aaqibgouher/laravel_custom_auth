@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Add Todo</div>
                <div class="panel-body">
                    <form method="post">
                        {{ csrf_field() }}
                        @if($error)
                        <div class="alert alert-danger">{{ $error }}</div>
                        @endif
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" class="form-control" name="category" required>
                            <!-- <select class="form-control" name="category" required>
                                <option value="DRAFT">Draft</option>
                                <option value="PUBLISHED">Published</option>
                            </select> -->
                        </div>
                        <div class="form-group">
                            <label>Todo</label>
                            <input type="integer" class="form-control" name="todo_name" required>
                        </div>
                        <div class="form-group">
                            <label>Order</label>
                            <input type="integer" class="form-control" name="todo" >
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary btn-block">    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection