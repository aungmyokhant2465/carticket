@extends('Components.master')

@Section('title')
    Users
@stop
@Section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><a href="{{route('get.addUser')}}" class="btn btn-outline-secondary"><spa class="fa fa-user-plus"></spa></a></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 offset-1">
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover" id="userTable">
                                <thead style="background: dimgrey">
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Store Name</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#img{{$user->id}}"><img alt="user's image" src="{{route('image',['image_name'=>$user->image_name])}}" class="img-size-50 img-circle"></a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="img{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="{{route('image',['image_name'=>$user->image_name])}}" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->roles->first()->name}}</td>
                                            <td>{{$user->store_name}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>
                                                <div class="row">
                                                    <a class="btn btn-outline-info" href="#" data-toggle="modal" data-target="#e{{$user->id}}" ><i class="fa fa-edit"></i></a>
                                                    <!--Edit Modal -->
                                                    <div class="modal fade" id="e{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form action="{{route('post.user.edit')}}" method="post" enctype="multipart/form-data">
                                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="image" ><span class="fa fa-image"></span></label>
                                                                            <input type="file" id="image" name="image" class="form-control @if($errors->has('image')) is-invalid @endif">
                                                                            @if($errors->has('image'))<span class="invalid-feedback">{{$errors->first('image')}}</span> @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="name">Name</label>
                                                                            <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" name="name" id="name" value="{{$user->name}}">
                                                                            @if($errors->has('name'))<span class="invalid-feedback">{{$errors->first('name')}}</span> @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="email">Email</label>
                                                                            <input type="email" class="form-control @if($errors->has('email')) is-invalid @endif" name="email" id="email" value="{{$user->email}}">
                                                                            @if($errors->has('email'))<span class="invalid-feedback">{{$errors->first('email')}}</span> @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="phone">Phone</label>
                                                                            <textarea type="tel" class="form-control @if($errors->has('phone')) is-invalid @endif" name="phone" id="phone">{{$user->phone}}</textarea>
                                                                            @if($errors->has('phone'))<span class="invalid-feedback">{{$errors->first('phone')}}</span> @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="shop_name">Shop name</label>
                                                                            <input type="text" name="shop_name" id="shop_name" class="form-control @if($errors->has('shop_name')) is-invalid @endif" value="{{$user->store_name}}">
                                                                            @if($errors->has('shop_name')) <span class="invalid-feedback">{{$errors->first('shop_name')}}</span> @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="city">City</label>
                                                                            <select name="city" id="city" class="custom-select form-control @if($errors->has('city')) is-invalid @endif">
                                                                                @foreach($city as $c)
                                                                                    <option value="{{$c->id}}" @if($user->city_id == $c->id) selected @endif>{{$c->City_name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @if($errors->has('city')) <span class="invalid-feedback">{{$errors->first('city')}}</span> @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="address">Address</label>
                                                                            <textarea name="address" id="address" class="form-control @if($errors->has('address')) is-invalid @endif">{{$user->address}}</textarea>
                                                                            @if($errors->has('address')) <span class="invalid-feedback">{{$errors->first('address')}}</span> @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="role">Role</label>
                                                                            <select name="role" id="role" class="custom-select form-control @if($errors->has('role')) is-invalid @endif">
                                                                                @foreach($roles as $role)
                                                                                    <option value="{{$role->id}}" @if($user->roles->first()->id == $role->id) selected @endif>{{$role->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @if($errors->has('role')) <span class="invalid-feedback">{{$errors->first('role')}}</span> @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="password">Password</label>
                                                                            <input type="password" class="form-control @if($errors->has('password')) is-invalid @endif" name="password" id="password">
                                                                            @if($errors->has('password'))<span class="invalid-feedback">{{$errors->first('password')}}</span> @endif
                                                                        </div><div class="form-group">
                                                                            <label for="con_password">Confirm Password</label>
                                                                            <input type="password" class="form-control @if($errors->has('con_password')) is-invalid @endif" name="con_password" id="con_password">
                                                                            @if($errors->has('con_password'))<span class="invalid-feedback">{{$errors->first('con_password')}}</span> @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                    {{@csrf_field()}}
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a class="btn btn-outline-danger" href="#" data-toggle="modal" data-target="#d{{$user->id}}"><i class="fa fa-trash"></i></a>
                                                    <!--Delete Modal -->
                                                    <div class="modal fade" id="d{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form action="{{route('get.user.delete')}}" method="get">
                                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                                    <input type="hidden" name="image_name" value="{{$user->image_name}}">
                                                                    <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <span>Are you sure want to delete <em>{{$user->name}}</em> permanently?</span>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                @if(Session('info'))
                    <div class="row">
                        <div class="col-10 offset-1 text-center">
                            <div class="alert alert-success" style="position: fixed; bottom: 100px; right: 0; left: 0;" role="alert">
                                <span>{{Session('info')}}</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@stop

