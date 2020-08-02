@extends('Components.master')

@Section('title')
    Drivers
@stop
@Section('content')
    <div class="content-wrapper" style="position: absolute; top: auto; right: 0; left: 0;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><a href="{{route('get.drivers')}}" class="btn btn-outline-secondary"><spa class="fa fa-backward"></spa></a></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('get.drivers')}}">Drivers</a></li>
                            <li class="breadcrumb-item active">Driver</li>
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
                    <div class="col-5">
                        <figure class="figure">
                            <img src="{{route('image',['image_name'=>$driver->photo_name])}}" class="figure-img rounded img-fluid" alt="Coming Soon">
                            <figcaption class="figure-caption">Driver's photo</figcaption>
                        </figure>
                        <div class="row mt-5">
                            <div class="col-6">
                                <figure class="figure">
                                    <img src="{{route('image',['image_name'=>$driver->nrc_font_photo_name])}}" class="figure-img rounded img-fluid" alt="Coming Soon">
                                    <figcaption class="figure-caption text-right">Font of Driver's NRC</figcaption>
                                </figure>
                            </div>
                            <div class="col-6">
                                <figure class="figure">
                                    <img src="{{route('image',['image_name'=>$driver->nrc_back_photo_name])}}" class="figure-img rounded img-fluid" alt="Coming Soon">
                                    <figcaption class="figure-caption text-right">Back of Driver's NRC</figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="card">
                            <div class="card-header">
                                <span class="text-info" style="font-style: italic;">Driver's Information</span>
                            </div>
                            <div class="card-body">
                                <div class="table table-responsive">
                                    <table class="table-borderless" style="width: 100%;">
                                        <tr>
                                            <td>ID</td>
                                            <td>{{$driver->id}}</td>
                                        </tr>
                                        <tr>
                                            <td>Driver's name</td>
                                            <td>{{$driver->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{$driver->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth</td>
                                            <td>{{$driver->age}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{$driver->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{$driver->address}}</td>
                                        </tr>
                                        <tr>
                                            <td>NRC NO</td>
                                            <td>{{$driver->nrc}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                    <a href="{{route('get.editDriver',['driver_id'=>$driver->id])}}" class="btn btn-outline-primary mr-5"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#d{{$driver->id}}"><i class="fa fa-trash"></i></a>
                                    <!--Delete Modal -->
                                    <div class="modal fade" id="d{{$driver->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('get.deleteDriver')}}" method="get">
                                                    <input type="hidden" name="driver_id" value="{{$driver->id}}">
                                                    <input type="hidden" name="photo" value="{{$driver->photo_name}}">
                                                    <input type="hidden" name="fnrc" value="{{$driver->nrc_font_photo_name}}">
                                                    <input type="hidden" name="bnrc" value="{{$driver->nrc_back_photo_name}}">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Driver</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <span>Are you sure want to delete <em>{{$driver->name}}</em> permanently?</span>
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
                            </div>
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


