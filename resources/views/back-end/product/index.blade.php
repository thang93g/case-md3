@extends('back-end.core.master')

@section('be-content')



    <!-- Begin Page Content -->
    <div class="container-fluid">
        <a data-toggle="modal" data-target="#exampleModal"
           class="btn btn-success mb-4">Add a new Product</a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add a new product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Product name</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Image 2</label>
                                <input type="file" name="image2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Category</label>
                                <select name="category" class="form-control" id="">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Product price</label>
                                <input type="text" name="price" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Price">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Product Quantity</label>
                                <input type="text" name="quantity" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Quantity">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Gender</label>
                                <select name="gender" class="form-control" id="">
                                    <option value="Man">Man</option>
                                    <option value="Woman">Woman</option>
                                    <option value="Kid">Kid</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Image2</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Image2</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($products as $key=>$product)
                            <tr>
                                <td>{{++$key}}</td>
                                <td><a href="{{route('image.getProductImage',$product->id)}}">{{$product->name}}</a></td>
                                <td><img height="100px" width="100px" src="{{$product->image}}"></td>
                                <td><img height="100px" width="100px" src="{{$product->image2}}"></td>
                                <td>{{$product->categories->name}}</td>
                                <td>{{number_format($product->price)}} $</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->gender}}</td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#exampleModal{{$key}}" class="btn btn-success"><svg width="22px" height="22px" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg></a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Product name</label>
                                                            <input value="{{$product->name}}" type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Image</label>
                                                            <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Image 2</label>
                                                            <input type="file" name="image2" class="form-control" id="exampleFormControlInput1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Category</label>
                                                            <select name="category" class="form-control" id="">
                                                                @foreach($categories as $category)
                                                                    <option @if($product->category == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Product price</label>
                                                            <input value="{{$product->price}}" type="text" name="price" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Price">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Product Quantity</label>
                                                            <input value="{{$product->quantity}}" type="text" name="quantity" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Quantity">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Gender</label>
                                                            <select name="gender" class="form-control" id="">
                                                                <option @if($product->gender == 'Man') selected @endif >Man</option>
                                                                <option @if($product->gender == 'Woman') selected @endif >Woman</option>
                                                                <option @if($product->gender == 'Kid') selected @endif >Kid</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{route('product.destroy',$product->id)}}" class="btn btn-danger"><svg width="22px" height="22px" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg></a>
                                    <a href="" data-toggle="modal" data-target="#exampleModalImg{{$key}}" class="btn btn-primary"><svg width="22px" height="22px" viewBox="0 0 16 16" class="bi bi-folder-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M9.828 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91H9v1H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0 0 13.81 4H9.828zm-2.95-1.707L7.587 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672a1 1 0 0 1 .707.293z"/>
                                            <path fill-rule="evenodd" d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
                                        </svg></a></td>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalImg{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add image for product</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('image.store',$product->id)}}" method="post" enctype="multipart/form-data" id="image-form">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Image</label>
                                                        <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" id="add-image">Add</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <script>
        $(function () {

            $("#image-form").validate({
                rules: {
                    pName: {
                        required: true,
                    },
                    action: "required"
                },
                messages: {
                    pName: {
                        required: "Please enter some data",
                    },
                    action: "Please provide some data"
                }
            });
        });
    </script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


@endsection
