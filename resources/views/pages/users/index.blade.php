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
                <div class="card-header">Add New User</div>
                <div class="card-body">
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">User Name</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter user name">
                            @error('username')
                                <small id="input-10-error" class="error" for="input-10">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter user email address">
                            @error('email')
                                <small id="input-10-error" class="error" for="input-10">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter user phone number">
                            @error('phone')
                                <small id="input-10-error" class="error" for="input-10">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter user password">
                            @error('password')
                                <small id="input-10-error" class="error" for="input-10">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Enter password again">
                        </div>
                        <div class="form-group">
                            <label for="">Select User Role</label>
                            <select name="role" class="form-control">
                                <option>Select role</option>
                                @isset($roles)
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->role}}</option>
                                    @endforeach
                                @endisset
                            </select>
                            @error('role')
                                <small id="input-10-error" class="error" for="input-10">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Upload User Iamge</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <small id="input-10-error" class="error" for="input-10">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-light">
                                <i class="fa fa-lock"></i>
                                Submit User
                            </button>
                        </div>
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
                                    <th style="width: 5%">Image</th>
                                    <th>User Name</th>
                                    <th>Eamil</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="checkBox" value="{{$user->id}}">
                                        </td>
                                        <td>
                                            <div class="btn-group m-1">
                                                <button type="button" class="btn btn-light waves-effect waves-light text-success" data-toggle="tooltip" data-placement="top" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <button type="button" data-id="{{$user->id}}" class="btn btn-light waves-effect waves-light text-warning edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{$i++}}</td>
                                        <td><img src="{{asset('storage/users/'.$user->image)}}" alt="" style="width: 30px;"></td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->role}}</td>
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

    @include('pages.users.edit')
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
    <script>
        $(document).ready(function(){
            $("#checkall").click(function () {
                $(".checkBox").prop('checked', $(this).prop('checked'));
            });
            $(".checkBox").change(function(){
                if (!$(this).prop("checked")){
                $("#checkall").prop("checked",false);
                }
            });
        })
    </script>

    <script>
        $(".edit").on("click", function(){
            var id = $(this).data("id");

            if(id){
                $.ajax({
                    url: "{{route('users.index')}}"+ "/" + id + "/" + "edit",
                    method: "GET",
                    dataType: "json",
                    success: function(res){
                        if(res["status"] == "404"){
                            alert(res["msg"]);
                        }
                        else{
                            $("#id").val(res.id);
                            $("#username").val(res.name);
                            $("#phone").val(res.phone);
                            $("#email").val(res.email);
                            $("#role").val(res.role_id);
                            $("#modal").modal("show");
                        }
                    }
                })
            }else{
                alert("Please select at least one data");
            }
        })
    </script>

    <script>
        $("#delete").on('click', function(){
            var id = [];

            if(confirm("Are you sure to delete? This cannot be undo")){
                $(".checkBox:checked").each(function(){
                    id.push($(this).val());
                })

                if(id.length > 0){
                    $.ajax({
                        url: "{{route('users.remove')}}",
                        method: 'DELETE',
                        data: {id:id},
                        dataType: 'json',
                        success: function(res){
                            if(res['status'] == "200"){
                                location.reload(true);
                            }
                        }
                    })
                }else{
                    alert("Please select atleast one data to delete");
                }
            }
        })
    </script>
@endpush