<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Your modal title here</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="">User Name</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter user name">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter user email address">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter user phone number">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter user password">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter password again">
                    </div>
                    <div class="form-group">
                        <label for="">Select User Role</label>
                        <select name="role" id="role" class="form-control">
                            <option>Select role</option>
                            @isset($roles)
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->role}}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Upload User Iamge</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div> --}}
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-warning">
                            <i class="fa fa-lock"></i>
                            Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>