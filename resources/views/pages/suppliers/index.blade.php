@extends('layouts.app')

@push('styles')
    <!--Data Tables -->
    <link href="{{asset('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
@endpush
@section('content')
    @php
        $uniqueId = App\Model\UniqueId::Numeric(4);
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="fa fa-table"></i> Data Exporting
                        </div>
                        <div>
                            <button class="btn btn-success btn-block m-1" data-toggle="modal" data-target="#add">Add Buyer</button>
                        </div>
                    </div>
                </div>
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
                                    <th>Unique Id</th>
                                    <th>Supplier Name</th>
                                    <th>Eamil</th>
                                    <th>Supplier of</th>
                                    <th>Supplier type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($suppliers as $supplier)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="checkBox" value="{{$supplier->id}}">
                                        </td>
                                        <td>
                                            <div class="btn-group m-1">
                                                <button type="button" class="btn btn-light waves-effect waves-light text-success" data-toggle="tooltip" data-placement="top" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-light waves-effect waves-light text-info" data-toggle="tooltip" data-placement="top" title="Print">
                                                    <i class="fa fa-print"></i>
                                                </button>
                                                <button type="button" data-id="{{$supplier->id}}" class="btn btn-light waves-effect waves-light text-warning edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{$i++}}</td>
                                        <td>{{$supplier->unique_id}}</td>
                                        <td>{{$supplier->supplier_name}}</td>
                                        <td>{{$supplier->email}}</td>
                                        <td>{{$supplier->supplier_of}}</td>
                                        <td>{{$supplier->supplier_type}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="p-3">
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

    {{-- Create Modal --}}
    @include('pages.suppliers.add')

    {{-- edit Modal --}}
    @include('pages.suppliers.edit')
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
            $("#checkall").click(function () {
                $(".checkBox").prop('checked', $(this).prop('checked'));
            });
            $(".checkBox").change(function(){
                if (!$(this).prop("checked")){
                $("#checkall").prop("checked",false);
                }
            });
        })
    </script>
    <script>
        $(".edit").on("click", function(){
            var id = $(this).data("id");

            if(id){
                $.ajax({
                    url: "{{route('suppliers.index')}}"+ "/" + id + "/" + "edit",
                    method: "GET",
                    dataType: "json",
                    success: function(res){
                        if(res){
                            res.map(data => {
                                $("#id").val(data.id);
                                $("#unique_id").val(data.unique_id);
                                $("#supplier_name").val(data.supplier_name);
                                $("#company_name").val(data.company_name);
                                $("#email").val(data.email);
                                $("#phone").val(data.phone);
                                $("#address").val(data.address);
                                $(".country").val(data.country_id).trigger('change');
                                $("#supplier_of").val(data.supplier_of);
                                $("#supplier_type").val(data.supplier_type);
                            })
                            $("#edit").modal('show')
                        }
                    }
                })
            }else{
                alert("Please select at least one data");
            }
        })
    </script>
    <script>
        $(document).ready(function(){
            $(".country").on("change", function(){
                var id = $(this).val();

                $.ajax({
                    url: "{{url('country')}}" + "/" + id,
                    method: "GET",
                    dataType: "json",
                    success: function(data){
                        var opt = "";

                        for(var index in data){
                            opt += "<option value='"+data[index]['id']+"'>" + data[index]['city_name'] + "</option>";
                        }
                        $("select[name='city_id']").html(opt);
                        $("select[name='city_id']").attr('disabled', false);
                    }
                })
            })
        })
    </script>
    <script>
        $("#delete").on('click', function(){
            var id = [];

            if(confirm("Are you sure to delete? This cannot be undo")){
                $(".checkBox:checked").each(function(){
                    id.push($(this).val());
                })

                if(id.length > 0){
                    $.ajax({
                        url: "{{route('suppliers.remove')}}",
                        method: 'DELETE',
                        data: {id:id},
                        dataType: 'json',
                        success: function(res){
                            if(res['status'] == "200"){
                                location.reload(true);
                            }
                        }
                    })
                }else{
                    alert("Please select atleast one data to delete");
                }
            }
        })
    </script>
@endpush