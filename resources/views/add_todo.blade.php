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
                            <select class="form-control" name="category_id" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ ($category->id == $category_id) ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Todo</label>
                            <input type="integer" class="form-control" name="todo_name" required>
                        </div>
                        <div class="form-group">
                            <label>Order</label>
                            <input type="integer" class="form-control" name="todo_order" >
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary btn-block">    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection