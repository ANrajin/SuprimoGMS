@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                        <!-- Main content -->
                        <section class="invoice">
                            <!-- title row -->
                            <div class="row mt-3">
                            <div class="col-lg-6">
                                <h4><i class="fa fa-globe"></i> Bill of Material</h4>
                            </div>
                            <div class="col-lg-6">
                            <h5 class="float-sm-right">Date: @php echo date('d-M-Y') @endphp</h5>
                            </div>
                            </div>
                            
                            <hr>
                            <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <address>
                                <strong>Sample Name: {{$data1->sample_name}}</strong><br>
                                Prepared By: {{$data1->name}}<br>
                                </address>
                            </div><!-- /.col -->
                            <div class="col-sm-8 mb-3">
                                <div class="d-flex justify-content-end">
                                    <img src="{{asset('storage/Sample/'.$data1->image)}}" alt="" style="width: 200px;">
                                </div>
                            </div><!-- /.col -->
                            </div><!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Material</th>
                                        <th>Qty</th>
                                        <th>Unit Price</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                        $subtotal=0;
                                    @endphp
                                    @isset($data2)
                                        @foreach($data2 as $data)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$data->trims_name}}</td>
                                                <td>{{$data->qty}}</td>
                                                <td>{{$data->price}}</td>
                                                <td>{{$data->price*$data->qty}}</td>
                                            </tr>
                                            @php
                                                $subtotal += $data->qty * $data->price
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td colspan="4" style="text-align: right;">Subtotal</td>
                                            <td>{{$subtotal}}</td>
                                        </tr>
                                    @endisset
                                </tbody>
                                </table>
                            </div><!-- /.col -->
                            </div><!-- /.row -->
                        </section><!-- /.content -->
                </div>
            </div>
        </div>
    </div>
@endsection