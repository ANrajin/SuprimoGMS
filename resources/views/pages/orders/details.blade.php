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
                                <h4><i class="fa fa-globe"></i> Company Name</h4>
                            </div>
                            <div class="col-lg-6">
                            <h5 class="float-sm-right">Date: @php echo date('d-M-Y') @endphp</h5>
                            </div>
                            </div>
                            
                            <hr>
                            <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                <strong>Kudiland Inc</strong><br>
                                543 suthpark drive<br>
                                Boston, MA 94107<br>
                                Phone: (555) 539-1444<br>
                                Email: info@example.com
                                </address>
                            </div><!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                <strong>{{$buyer->buyer_name}}</strong><br>
                                {{$buyer->company_name}}<br>
                                {{$buyer->phone}}<br>
                                Email: {{$buyer->email}}
                                </address>
                            </div><!-- /.col -->
                            </div><!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Sample Name</th>
                                        <th>Description</th>
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
                                    @isset($details)
                                        @foreach($details as $detail)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$detail->sample_name}}</td>
                                                <td>{{$detail->desc}}</td>
                                                <td>{{$detail->qty}}</td>
                                                <td>{{$detail->price}}</td>
                                                <td>{{$detail->price*$detail->qty}}</td>
                                            </tr>
                                            @php
                                                $subtotal += $detail->qty * $detail->price
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td colspan="5" style="text-align: right;">Subtotal</td>
                                            <td>{{$subtotal}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="text-align: right">Tax (5%)</td>
                                            <td>{{$subtotal*0.05}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="text-align: right">Shipment (2%)</td>
                                            <td>{{$subtotal*0.02}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="text-align: right">Total</td>
                                            <td>{{($subtotal + ($subtotal*0.05)) + ($subtotal*0.02)}}</td>
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