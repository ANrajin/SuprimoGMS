@extends('layouts.app')
@push('styles')
    <!--Data Tables -->
    <link href="{{asset('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
@endpush
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Add New Product</div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-light">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><i class="fa fa-table"></i> Data Exporting</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 2%">
                                        <input type="checkbox" id="checkall">
                                    </th>
                                    <th style="width: 10%">Action</th>
                                    <th style="width: 5%">#</th>
                                    <th>Product Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="checkBox" value="{{$product->id}}">
                                        </td>
                                        <td>
                                            <div class="btn-group m-1">
                                                <button type="button" class="btn btn-light waves-effect waves-light text-success" data-toggle="tooltip" data-placement="top" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-light waves-effect waves-light text-info" data-toggle="tooltip" data-placement="top" title="Print">
                                                    <i class="fa fa-print"></i>
                                                </button>
                                                <button type="button" data-id="{{$product->id}}" class="btn btn-light waves-effect waves-light text-warning edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{$i++}}</td>
                                        <td>{{$product->product_name}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="px-3">
                            <button type="button" id="delete" class="btn btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                &nbsp;Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <!--Data Tables js-->
    <script src="{{asset('assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            //Default data table
            $('#table').DataTable();
        })
    </script>
@endpush