@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
@endpush
@section('content')
    <h4>Create New Order</h4>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Order Information</div>
                <div class="card-body">
                    <form action="{{route('orders.store')}}" name="order_form" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Order Date</label>
                            <input type="text" class="form-control" name="order_date" id="order_date">
                        </div>
                        <div class="form-group">
                            <label for="">Buyer</label>
                            <select name="buyer_id" class="form-control">
                                <option value="">Select Buyer</option>
                                @isset($buyers)
                                    @foreach($buyers as $buyer)
                                        <option value="{{$buyer->id}}">{{$buyer->buyer_name}}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">L/C</label>
                            <input type="text" class="form-control" name="order_lc">
                        </div>
                        <div class="form-group">
                            <label for="">Bank Name</label>
                            <input type="text" class="form-control" name="bank">
                        </div>
                        <div class="form-group">
                            <label for="">Shipment Date</label>
                            <input type="text" class="form-control" name="shipment_date" id="shipment_date">
                        </div>
                        <div class="form-group">
                            <label for="">Shipment type</label>
                            <select name="shipment_type" class="form-control">
                                <option value="">Select Shipment Type</option>
                                <option value='Freight on board'>Freight On Board</option>
                                <option value="Cost net freight">Cost Net Freight</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Attachments</label>
                            <input type="file" name="files" class="form-control" multiple>
                            <small>Supported file types pdf, xlxs, docx, csv</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order Details</div>
                <div class="card-body">
                    <form action="{{route('order.info')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td style="width: 20%">
                                        <select name="sample_id" id="sample_id" class="form-control">
                                            <option value="">Select Sample</option>
                                            @isset($samples)
                                                @foreach ($samples as $sample)
                                                    <option value="{{$sample->id}}">{{$sample->sample_name}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </td>
                                    <td style="width: 8%">
                                        <input type="text" name="price" id="unit_price" class="form-control" placeholder="price" readonly>
                                    </td>
                                    <td style="width: 8%">
                                        <input type="text" name="qty" class="form-control" placeholder="quantity">
                                    </td>
                                    <td style="width: 64%">
                                        <input type="text" name="desc" class="form-control" placeholder="Description">
                                    </td>
                                    <td>
                                        <button class="btn btn-success" type="submit" id="add_info">+</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>SL</th>
                                <th style="width: 15%">Sample Name</th>
                                <th style="width: 5%">Quantity</th>
                                <th style="width: 5%">Price(Per Unit)</th>
                                <th style="width: 65%">Description</th>
                                <th style="width: 5%">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                $total=0;
                            @endphp
                            @if (Session::has('cart'))
                                @foreach (Session::get('cart') as $key => $details)
                                    <tr>
                                        <td>
                                            <button type="button" class="btn text-danger">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                        <td>{{$i++}}</td>
                                        <td>{{ $details['name'] }}</td>
                                        <td>{{ $details['qty'] }}</td>
                                        <td>BDT. {{ $details['price'] }}</td>
                                        <td>{{ $details['desc'] }}</td>
                                        <td>BDT. {{ $details['qty'] * $details['price'] }}</td>
                                    </tr>
                                    @php
                                        $total += $details['qty'] * $details['price']
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="6" style="text-align: right;">Subtotal</td>
                                    <td><input type="text" class="form-control" name="sub" id="sub" value="{{ $total }}" readonly></td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align: right">Tax (%)</td>
                                    <td class="text-success">
                                        <div class="form-group m-0">
                                            <input type="text" class="form-control" id="tax" name="tax">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align: right">Discount (%)</td>
                                    <td class="text-success">
                                        <div class="form-group m-0">
                                            <input type="text" class="form-control" id="disc" name="discount">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align: right">Total</td>
                                    <td class="text-success">
                                        <input type="text" class="form-control" id="total" name="total" value="" readonly>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-light" onclick="order()">Generate Invoice</button>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('assets/plugins/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#tax").on("keyup", function(){
                var val = $(this).val()/100;
                var sub = parseFloat($("#sub").val());
                var calc = parseFloat(sub * val);

                $("#total").val(sub + calc);
            })

            $("#disc").on("keyup", function(){
                var val = $(this).val()/100;
                var total = parseFloat($("#total").val());
                var calc = parseFloat(total * val);

                $("#total").val(total - calc);
            })
        })
    </script>
    <script>
        function order(){
            if(confirm("Are you sure?")){
                document.order_form.submit();
            }
        }
    </script>
    <script>
        $(document).ready(function(){
            $('#order_date').datepicker({
                autoclose: true,
                todayHighlight: true
            });
        })

        $(document).ready(function(){
            $('#shipment_date').datepicker({
                autoclose: true,
                todayHighlight: true
            });
        })
    </script>
    <script>
        $(document).ready(function(){
            $("#sample_id").on("change", function(){
                var id = $(this).val();

                $.ajax({
                    url: "{{url("getSample")}}" + "/" + id,
                    method: "GET",
                    dataType: "json",
                    success: function(data){
                        $("#unit_price").val(data.unit_price);
                    }
                })
            })
        })
    </script>
@endpush