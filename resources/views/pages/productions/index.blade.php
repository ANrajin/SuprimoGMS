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
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Descriptions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($productions as $production)
                            <tr>
                                <td>
                                    <input type="checkbox" class="checkBox" value="{{$production->id}}">
                                </td>
                                <td>
                                    <div class="btn-group m-1">
                                        <button data-id="{{$production->id}}" class="btn btn-light waves-effect waves-light text-success list" 
                                        data-toggle="tooltip" data-placement="top" title="Order Details">
                                            <i class="fa fa-eye"></i>
                                    </button>
                                    </div>
                                </td>
                                <td>{{$i++}}</td>
                                <td>{{$production->order_id}}</td>
                                <td>{{$production->po_date}}</td>
                                <td>{{$production->description}}</td>
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
    @include('pages.productions.list')
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
    <script>
        $(document).ready(function(){
            $(".list").on("click", function(){
                var id = $(this).data("id")

                $.ajax({
                    url: "{{route('productions.details')}}",
                    method: "POST",
                    data: {id:id},
                    dataType: "json",
                    success: function(res){
                        res.data.map(data => {
                            $("#o_id").html(data.id)
                            $("#name").html(data.buyer_name)
                            $("#shipment").html(data.shipment_date)
                        })

                        var row = ""
                        var i = 1;
                        res.items.map(data => {
                            row += "<tr>"
                            row += "<td>"+ (i++) +"</td>"
                            row += "<td>#"+data.id+"</td>"
                            row += "<td>"+data.sample_name+"</td>"
                            row += "<td>"+data.po_qty+"</td>"
                            row += "<td>"+data.sewing_qty+"</td>"
                            row += "<td>"+data.wash_qty+"</td>"
                            row += "<td>"+data.finished_qty+"</td>"
                            row += "<td>"+data.westage+"</td>"
                            row += "<td>"+data.date+"</td>"
                            row += "</tr>"
                        })

                        $("#list_table").html(row)
                        $("#list").modal("show")
                    }
                })
            })
        })
    </script>
@endpush