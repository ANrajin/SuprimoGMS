@extends('layouts.app')
@push('styles')
    <!--Data Tables -->
    <link href="{{asset('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
@endpush
@section('content')
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
                            <th>Order</th>
                            <th>Buyer Name</th>
                            <th>Company Name</th>
                            <th>L/C</th>
                            <th>Bank</th>
                            <th>Order Date</th>
                            <th>Shipment Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    <input type="checkbox" class="checkBox" value="{{$order->id}}">
                                </td>
                                <td>
                                    <div class="btn-group m-1">
                                        <a href="{{route('orders.show', $order->id)}}" class="btn btn-light waves-effect waves-light text-success" 
                                        data-toggle="tooltip" data-placement="top" title="Order Details">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>{{$i++}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->buyer_name}}</td>
                                <td>{{$order->company_name}}</td>
                                <td>{{$order->LC}}</td>
                                <td>{{$order->bank}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->shipment_date}}</td>
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