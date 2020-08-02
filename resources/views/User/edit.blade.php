@extends('Components.master')

@Section('title')
    Edit User
@stop
@Section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><a href="{{route('get.users')}}" class="btn btn-outline-secondary"><spa class="fa fa-users"></spa></a></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('post.user.edit')}}" method="post" enctype="multipart/form-data">
                            <div class="card shadow-lg w-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                            <div class="form-group">
                                                <label for="image" ><span class="fa fa-image"></span> User photo</label>
                                                <input type="file" id="image" name="image" class="form-control @if($errors->has('image')) is-invalid @endif" value="{{old('image')}}">
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
                                        </div>
                                        <div class="col-6">
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
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group text-right">
                                        <button class="btn btn-outline-info btn-lg">Update</button>
                                    </div>
                                </div>
                            </div>
                            {{@csrf_field()}}
                        </form>
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
