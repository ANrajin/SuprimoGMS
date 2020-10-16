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
                            <th>Season</th>
                            <th>Style No</th>
                            <th>Sample Name</th>
                            <th>Sample Type</th>
                            <th>Product Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($samples as $sample)
                            <tr>
                                <td>
                                    <input type="checkbox" class="checkBox" value="{{$sample->id}}">
                                </td>
                                <td>
                                    <div class="btn-group m-1">
                                        {{-- <button type="button" class="btn btn-light waves-effect waves-light text-success" data-toggle="tooltip" data-placement="top" title="View">
                                            <i class="fa fa-eye"></i>
                                        </button> --}}
                                        <a href="{{url('bom', $sample->id)}}" class="btn btn-light waves-effect waves-light text-info bom" data-toggle="tooltip" data-placement="top" title="Bill of materials">
                                            <i class="fa fa-list"></i>
                                        </a>
                                        {{-- <button type="button" data-id="{{$sample->id}}" class="btn btn-light waves-effect waves-light text-warning edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </button> --}}
                                    </div>
                                </td>
                                <td>{{$i++}}</td>
                                <td>{{$sample->season}}</td>
                                <td>{{$sample->style_no}}</td>
                                <td>{{$sample->sample_name}}</td>
                                <td>{{$sample->sample_type}}</td>
                                <td>{{$sample->product_name}}</td>
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