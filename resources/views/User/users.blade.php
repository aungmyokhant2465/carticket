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
                                                    <a class="btn btn-outline-info" href="{{route('get.user.edit',['user_id'=>$user->id])}}"><i class="fa fa-edit"></i></a>
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
                            {{ $users->links() }}
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

