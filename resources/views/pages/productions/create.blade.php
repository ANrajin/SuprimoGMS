@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-md-10 col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">Production Tracking</div>
                <div class="card-body">
                    <form action="{{route('productions.store')}}" method="post">
                        @csrf
                        <div class="row form-group">
                            <div class="col-6">
                                <label for="">Date</label>
                                <input type="date" name="po_date" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="">Order ID</label>
                                <input type="text" name="order_id" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="desc" rows="5" class="form-control"></textarea>
                        </div>
                        <hr>
                        <div id="production">
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="">Sample</label>
                                    <select name="sample_id[]" class="form-control sample"></select>
                                </div>
                                <div class="col-md-2">
                                    <label for="">PO</label>
                                    <input type="text" name="po_qty[]" class="form-control" placeholder="qty">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Sewing</label>
                                    <input type="text" name="sewing_qty[]" class="form-control" placeholder="qty">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Washed</label>
                                    <input type="text" name="wash_qty[]" class="form-control" placeholder="qty">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Finished</label>
                                    <input type="text" name="finished_qty[]" class="form-control" placeholder="qty">
                                </div>
                                <div class="col-md-1">
                                    <label for="">Westage</label>
                                    <input type="text" name="westage[]" class="form-control" placeholder="qty">
                                </div>
                                <div class="col-md-1">
                                    <label for="">Add New</label>
                                    <button type="button" id="add" class="btn btn-success">+</button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-light">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function append(){
            $.ajax({
                url: "{{route('getSamples')}}",
                method: "GET",
                dataType: "json",
                success: function(res){
                    var opt = "";
                    res.map(data => {
                        opt += "<option value='"+data.id+"'>"+data.sample_name+"</option>"
                    })

                    $(".sample").html(opt)
                }
            })
        }

        $(document).ready(function(){
            append();
            var count = 1;

            $("#add").on("click", function() {
                count = count + 1;

                var row = "<div class = 'row form-group row"+count+"'>";
                row += "<div class='col-md-2'><select name='sample_id[]' class='form-control sample'></select></div>";
                row += "<div class='col-md-2'><input type='text' name='po_qty[]' class='form-control' placeholder='qty'></div>";
                row += "<div class='col-md-2'><input type='text' name='sewing_qty[]' class='form-control' placeholder='qty'></div>";
                row += "<div class='col-md-2'><input type='text' name='wash_qty[]' class='form-control' placeholder='qty'></div>";
                row += "<div class='col-md-2'><input type='text' name='finished_qty[]' class='form-control' placeholder='qty'></div>";
                row += "<div class='col-md-1'><input type='text' name='westage[]' class='form-control' placeholder='qty'></div>";
                row += "<div class='col-md-1'><button type='button' class='btn btn-danger rmv' data-button='row"+count+"'>-</button></div>";
                row += "</div>";

                $('#production').append(row);
                append();
            })

            $(document).on('click', '.rmv', function() {
                var del = $(this).data('button');
                $('.' + del).remove();
            })
        })
    </script>
@endpush