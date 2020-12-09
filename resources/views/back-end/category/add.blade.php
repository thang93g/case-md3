@extends('back-end.core.master')

@section('be-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add new category</h6>
            </div>
            <div class="card-body">
                <form action="{{route('category.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Category Name">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
