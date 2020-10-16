@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">Create New Bill of Material</div>
                <div class="card-body">
                    <form action="{{route('bom.store')}}" method="POST" name="bomForm">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">Prepared By</label>
                                <input type="text" class="form-control" value="{{Auth::user()->name}}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Date</label>
                                <input type="text" name="date" class="form-control" value="<?php echo date('d-M-Y') ?>" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">Sample</label>
                                <select name="sample_id" class="form-control" required>
                                    <option>Select Sample</option>
                                    @isset($sample)
                                        @foreach($sample as $row)
                                            <option value="{{$row->id}}">{{$row->sample_name}}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-">
                                <label for="">Description</label>
                                <textarea name="desc" class="form-control"></textarea>
                            </div>
                        </div>
                    </form>
                    <div class="my-3">
                        <label for="">Material Cost Informations</label>
                        <form action="{{route('bom.info')}}" method="post">
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <select name="trim_id" class="form-control" required>
                                        <option value="">Select Trim</option>
                                        @isset($trims)
                                            @foreach($trims as $trim)
                                            <option value="{{$trim->id}}">{{$trim->trims_name}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control" name="qty" placeholder="Quantity">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="price" placeholder="Price per unit">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-success" type="submit" id="add_info">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="my-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price(Per Unit)</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                    $total=0;
                                @endphp
                                @if (Session::has('bom'))
                                    @foreach (Session::get('bom') as $key => $details)
                                        <tr>
                                            <td>
                                                <a href="" class="btn text-danger"><i class="fa fa-times"></i></a>
                                            </td>
                                            <td>{{$i++}}</td>
                                            <td>{{ $details['name'] }}</td>
                                            <td>{{ $details['qty'] }}</td>
                                            <td>BDT. {{ $details['price'] }}</td>
                                            <td>BDT. {{ $details['qty'] * $details['price'] }}</td>
                                        </tr>
                                        @php
                                            $total += $details['qty'] * $details['price']
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="5" style="text-align: right;">Subtotal</td>
                                        <td>BDT. {{ $total }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <hr>

                    <button type="submit" onclick="bom()" class="btn btn-light">Create New</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function bom(){
            if(confirm("Are you sure?")){
                document.bomForm.submit();
            }
        }
    </script>
@endpush