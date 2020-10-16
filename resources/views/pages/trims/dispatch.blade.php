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
                <div class="card-header">Dispatch Trims or Material</div>
                <div class="card-body">
                    <form action="{{route('dispatch.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Date</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Trims/Material Name</label>
                            <select name="trims_id" class="form-control">
                                @foreach ($trims as $item)
                                    <option value="{{$item->id}}">{{$item->trims_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Who took out</label>
                            <input type="text" name="took" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Quntity</label>
                            <input type="text" name="qty" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Purpose</label>
                            <input type="text" name="purpose" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-light">Dispatch Trim</button>
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
                                    <th>Date</th>
                                    <th>Trim/Material</th>
                                    <th>Who Took out</th>
                                    <th>Quantity</th>
                                    <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($dispatch as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="checkBox" value="{{$item->id}}">
                                        </td>
                                        <td>
                                            <div class="btn-group m-1">
                                                <button type="button" data-id="{{$item->id}}" class="btn btn-light waves-effect waves-light text-warning edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->date}}</td>
                                        <td>{{$item->trims_name}}</td>
                                        <td>{{$item->took_out}}</td>
                                        <td>{{$item->dispatch_qty}}</td>
                                        <td>{{$item->purpose}}</td>
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