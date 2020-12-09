@extends('back-end.core.master')

@section('be-content')



    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr style="text-align: center">
                            <th>#</th>
                            <th>Account</th>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Postal Code</th>
                            <th>Total Price</th>
                            <th>Address</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Order at</th>
                            <th colspan="3">Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr style="text-align: center">
                            <th>#</th>
                            <th>Account</th>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Postal Code</th>
                            <th>Total Price</th>
                            <th>Address</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Order at</th>
                            <th colspan="3">Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($orders as $key=>$order)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$order->users->email}}</td>
                                <td>{{$order->customer_name}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->postal_code}}</td>
                                <td>$ {{number_format($order->total_price,2)}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->payment}}</td>
                                <td><p id="order-status{{$order->id}}">{{$order->status}}</p></td>
                                <td>{{$order->created_at}}</td>
                                <td><button class="fa fa-search btn-success" data-toggle="modal"
                                            data-target="#exampleModal{{$key}}"></button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>
                                                    <button type="button" class="btn btn-close" data-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-info">
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Image</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Category</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Q</th>
                                                        </tr>
                                                        @foreach($order->products as $key => $product)
                                                            <tr>
                                                                <td>{{++$key}}</td>
                                                                <td><img height="70px" width="70px" src="{{$product->image}}">
                                                                </td>
                                                                <td>{{$product->name}}</td>
                                                                <td>{{$product->categories->name}}</td>
                                                                <td>$ {{number_format($product->price,2)}}</td>
                                                                <td>{{$product->pivot->quantity}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td><button value="{{$order->id}}" class="fa fa-pen btn-primary edit-order"></button></td>
                                <td><button value="{{$order->id}}" class="fa fa-trash btn-danger"></button></td>
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
        $('.edit-order').click(function (){
            let id = $(this).val();
            $.ajax({
                type:'GET',
                url:'admin/order/edit/' + id,
                success: function (){
                    console.log('success')
                }
            })
            $("#order-status" + id).text('Shipped');
        })
    </script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


@endsection
