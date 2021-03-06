<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Your modal title here</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">Add New Buyer</div>
                    <div class="card-body">
                        <form action="{{route('buyers.store')}}" method="POST">
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="">Buyer ID</label>
                                    <input type="text" name="unique_id" class="form-control" value="Buyer#{{$uniqueId}}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Date</label>
                                    <input type="text" name="date" class="form-control" value="<?php echo date('d-m-Y') ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Buyer Name</label>
                                <input type="text" name="buyer_name" class="form-control">
                                @error('buyer_name')
                                    <small id="input-10-error" class="error" for="input-10">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Company Name</label>
                                <textarea name="company_name" class="form-control" rows="2"></textarea>
                                @error('company_name')
                                    <small id="input-10-error" class="error" for="input-10">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" class="form-control">
                                    @error('phone')
                                        <small id="input-10-error" class="error" for="input-10">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control">
                                    @error('email')
                                        <small id="input-10-error" class="error" for="input-10">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea name="address" rows="3" class="form-control"></textarea>
                                @error('address')
                                    <small id="input-10-error" class="error" for="input-10">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label for="">Country</label>
                                    <select name="country_id" class="form-control country" required>
                                        <option>Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">City</label>
                                    <select name="city_id" class="form-control" disabled required></select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Buyer Type</label>
                                    <select name="buyer_type" class="form-control" required>
                                        <option>Select Buyer Type</option>
                                        <option value="Local">Local</option>
                                        <option value="Foreign">Foriegn</option>
                                    </select>
                                </div>
                            </div>
                            <hr>

                            <button type="submit" class="btn btn-light">
                                <i class="fa fa-lock"></i>&nbsp;Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>