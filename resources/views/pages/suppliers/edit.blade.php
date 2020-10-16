<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Add New Supplier</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('supplier.update')}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row form-group">
                                <input type="hidden" id="id" name="id">
                                <div class="col-md-6">
                                    <label for="">Supplier Unique ID</label>
                                    <input type="text" name="unique_id" id="unique_id" class="form-control" value="{{$uniqueId}}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Date</label>
                                    <input type="text" name="date" class="form-control" value="<?php echo date('d-m-Y') ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Supplier Name</label>
                                <input type="text" name="supplier_name" id="supplier_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Company Name</label>
                                <textarea name="company_name" id="company_name" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea name="address" id="address" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="">Country</label>
                                    <select name="country_id" class="form-control country" required>
                                        <option>Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">City</label>
                                    <select name="city_id" id="city_id" class="form-control" disabled required></select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="">Supplier of</label>
                                    <select name="supplier_of" id="supplier_of" class="form-control" required>
                                        <option>Select Supplier of</option>
                                        <option value="Trims">Trims</option>
                                        <option value="Materials">Materials</option>
                                        <option value="Accessiories">Accessiories</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Supplier Type</label>
                                    <select name="supplier_type" id="supplier_type" class="form-control" required>
                                        <option>Select Supplier Type</option>
                                        <option value="local">Local</option>
                                        <option value="foreign">Foriegn</option>
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <button type="submit" class="btn btn-light">
                                <i class="fa fa-lock"></i>&nbsp;update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>