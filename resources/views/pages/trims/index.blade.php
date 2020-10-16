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
                <div class="card-header">Add Trims or Material</div>
                <div class="card-body">
                    <form action="{{route('trims.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Trims/Material Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Type</label>
                            <select name="type" class="form-control">
                                <option value="">Select Option</option>
                                <option value="Trims">Trims</option>
                                <option value="Materials">Materials</option>
                                <option value="Accessories">Accessories</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Puchase Quntity</label>
                            <input type="text" name="qty" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Puchase Price</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Supplier</label>
                            <select name="supplier_id" class="form-control">
                                <option value="">Select Supplier</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-light">Add Trim</button>
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
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Supplier</th>
                                    <th>Purchase Quantity</th>
                                    <th>Puchase Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($trims as $trim)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="checkBox" value="{{$trim->id}}">
                                        </td>
                                        <td>
                                            <div class="btn-group m-1">
                                                <button type="button" data-id="{{$trim->id}}" class="btn btn-light waves-effect waves-light text-warning edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{$i++}}</td>
                                        <td>{{$trim->trims_name}}</td>
                                        <td>{{$trim->type}}</td>
                                        <td>{{$trim->supplier_name}}</td>
                                        <td>{{$trim->qty}}</td>
                                        <td>tk {{$trim->puchase_price}}/=</td>
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