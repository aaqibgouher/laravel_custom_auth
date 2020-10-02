@extends('layout.master')

@section('content')
    <div class="row">
        
        <h2>Todo<a href="{{ route('add_category') }}" class="btn btn-default pull-right">Add Category</a><a href="{{ route('add_todo') }}" class="btn btn-default pull-right">Add Todo</a></h2><hr>
        <!-- will loop it for showing different categories here. -->
        
        <div class="col-sm-3">
            <div class="list-group">
                <div class="list-group-item" style="background-color:grey;color:white;">Category
                    <div class="dropup pull-right">
                        <a class="dropdown-toggle" style="color:white;" href="#" data-toggle="dropdown">
                            <i class="fa fa-ellipsis-v"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-pencil"></i> Edit </a></li>
                            <li><a href="#"><i class="fa fa-trash"></i> Delete </a></li>
                            <!-- <li><a href="#">JavaScript</a></li>
                            <li class="divider"></li>
                            <li><a href="#">About Us</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="list-group-item">
                    <a class="btn btn-success btn-block" href="{{ route('add_todo') }}">Add Toto</a>
                </div>
                <!-- will loop here for printing the todos inside that category. -->
                <div class="list-group-item wrap">
                    <p>task 1</p>
                </div>
                
            </div>
        </div>  
    </div>
@endsection