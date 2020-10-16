@extends('layouts.app')
@push('styles')
    <!--Data Tables -->
    <link href="{{asset('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
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
                                    <th>Trims Name</th>
                                    <th>Type</th>
                                    <th>Pusrchase Quantity</th>
                                    <th>Total Dispatched</th>
                                    <th>Remaining Quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($stocks as $trim)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="checkBox" value="{{$trim->id}}">
                                        </td>
                                        <td>
                                            <div class="btn-group m-1">
                                                <button type="button" data-id="{{$trim->id}}" class="btn btn-light waves-effect waves-light text-warning list" data-toggle="tooltip" data-placement="top" title="list item">
                                                    <i class="fa fa-list"></i>
                                                </button>
                                                <button type="button" data-id="{{$trim->id}}" class="btn btn-light waves-effect waves-light text-info" data-toggle="tooltip" data-placement="top" title="print">
                                                    <i class="fa fa-print"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{$i++}}</td>
                                        <td>{{$trim->trims_name}}</td>
                                        <td>{{$trim->type}}</td>
                                        <td>{{$trim->qty}}</td>
                                        <td>{{$trim->stock}}</td>
                                        <td class="{{($trim->qty - $trim->stock < 10)? 'text-danger' : 'text-info'}}">
                                            {{$trim->qty - $trim->stock}}
                                        </td>
                                        <td>
                                            {{($trim->qty - $trim->stock < 10)? 'out of stock' : 'in stock'}}
                                        </td>
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

    {{-- list Modal --}}
    @include('pages.stocks.list')
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
                    url: "{{route('stocks.list')}}",
                    method: "POST",
                    data: {id:id},
                    dataType: "json",
                    success: function(res){
                        res.trims.map(data => {
                            $("#name").html(data.trims_name)
                            $("#type").html(data.type)
                            $("#supplier").html(data.supplier_name)
                        })

                        var row = ""
                        var i = 1;
                        res.items.map(data => {
                            row += "<tr>"
                            row += "<td>"+ (i++) +"</td>"
                            row += "<td>#"+data.id+"</td>"
                            row += "<td>"+data.trims_name+"</td>"
                            row += "<td>"+data.took_out+"</td>"
                            row += "<td>"+data.dispatch_qty+"</td>"
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