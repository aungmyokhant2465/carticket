@extends('Components.master')
@Section('title')
    Cars
@stop
@Section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><a href="#" data-toggle="modal" data-target="#add_car" class="btn btn-outline-secondary"><i class="fa fa-plus-square"></i> Add Car</a></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('get.cars')}}">Cars</a></li>
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
                    <dvi class="col-sm-12">
                        <nav class="navbar navbar-light bg-light float-right">
                            <form class="form-inline" method="get" action="{{route('car.search')}}">
                                <div class="form-group">
                                    <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
                                </div>
                                {{csrf_field()}}
                            </form>
                        </nav>
                    </dvi>
                </div>
                <!-- add car modal -->
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="add_car">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form method="post" enctype="multipart/form-data" action="{{route('post.addCar')}}">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="fas fa-bus-alt"></i> <em> Add Car</em></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input name="car_photo" type="file" id="car_photo" class="custom-file-input form-control @if($errors->has('car_photo')) is-invalid @endif" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="car_photo">Choose car photo</label>
                                        </div>
                                        @if($errors->has('car_photo'))<span class="invalid-feedback">{{$errors->first('car_photo')}}</span> @endif
                                    </div>
                                    <div class="form-group">
                                        <input value="{{old('car_no')}}" type="text" name="car_no" class="form-control @if($errors->has('car_no')) is-invalid @endif" placeholder="Car No">
                                        @if($errors->has('car_no'))<span class="invalid-feedback">{{$errors->first('car_no')}}</span> @endif
                                    </div>
                                    <div class="form-group">
                                        <input value="{{old('car_modal')}}" type="text" name="car_modal" class="form-control @if($errors->has('car_modal')) is-invalid @endif" placeholder="Car Modal">
                                        @if($errors->has('car_modal'))<span class="invalid-feedback">{{$errors->first('car_modal')}}</span> @endif
                                    </div>
                                    <div class="form-group">
                                        <input value="{{old('car_company')}}" type="text" name="car_company" class="form-control @if($errors->has('car_company')) is-invalid @endif" placeholder="Car Company">
                                        @if($errors->has('car_company'))<span class="invalid-feedback">{{$errors->first('car_company')}}</span> @endif
                                    </div>
                                    <div class="form-group">
                                        <select name="driver_id" class="form-control custom-select @if($errors->has('driver_id')) is-invalid @endif">
                                            <option></option>
                                            @foreach($drivers as $driver)
                                                <option value="{{$driver->id}}"><i>({{$driver->id}})</i> {{$driver->name}}</option>
                                                @endforeach
                                        </select>
                                        @if($errors->has('driver_id'))<span class="invalid-feedback">{{$errors->first('driver_id')}}</span> @endif
                                    </div>
                                    <div class="form-group form-check">
                                        <input name="type" type="checkbox" class="form-check-input" id="type" value=1>
                                        <label class="form-check-label" for="type">VIP</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-info btn-lg">Save</button>
                                </div>
                                {{@csrf_field()}}
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /add car modal -->
                <div class="row">
                    <div class="col-6">
                        <div class="table table-responsive">
                            <h3 class="d-inline text-secondary"><em>Available Cars</em></h3>
                            <span class="float-right">{{$cars->links()}}</span>
                            <table class="table table-hover" width="100%">
                                <thead style="background: dimgray">
                                    <tr>
                                        <th>Photo</th>
                                        <th>Car NO</th>
                                        <th>Modal</th>
                                        <th>Company</th>
                                        <th>Driver</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cars as $car)
                                        @if($car->state)
                                            <tr>
                                                <td><a href="#" data-toggle="modal" data-target="#c{{$car->id}}"><img alt="coming soon" class="img img-size-50" src="{{route('image',['image_name'=>$car->car_photo_name])}}"></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="c{{$car->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img src="{{route('image',['image_name'=>$car->car_photo_name])}}" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$car->car_no}}</td>
                                                <td>{{$car->car_modal}}</td>
                                                <td>{{$car->car_company}}</td>
                                                <td>{{$car->Driver->name}}</td>
                                                <td>@if($car->type) VIP @else Normal @endif</td>
                                                <td>
                                                    <div class="btn-group dropup">
                                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-cogs"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a href="#" class="dropdown-item btn-block text-info" data-toggle="modal" data-target="#edit_car{{$car->id}}"><i class="fa fa-edit"> Edit</i></a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="#" data-toggle="modal" data-target="#d{{$car->id}}" class="dropdown-item btn-block text-danger"><i class="fa fa-trash"> Remove</i></a>
                                                        </div>
                                                    </div>
                                                    <a @if(!$car->state)style="pointer-events: none; color: #2d3238;" @endif class="btn btn-outline-light float-right"  data-toggle="tooltip" data-placement="top" title="Maintain" href="{{route('get.carState',['car_id'=>$car->id])}}"><i class="fas fa-wrench"></i></a>
                                                    <!-- edit car modal -->
                                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="edit_car{{$car->id}}">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <form method="post" enctype="multipart/form-data" action="{{route('post.carEdit')}}">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"><i class="fas fa-bus-alt"></i> <em> Edit Car</em></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input name="car_id" value="{{$car->id}}" type="hidden">
                                                                        <div class="form-group">
                                                                            <div class="custom-file">
                                                                                <input name="car_photo" type="file" id="car_photo" class="custom-file-input form-control @if($errors->has('car_photo')) is-invalid @endif" aria-describedby="inputGroupFileAddon01">
                                                                                <label class="custom-file-label" for="car_photo">Choose car photo</label>
                                                                            </div>
                                                                            @if($errors->has('car_photo'))<span class="invalid-feedback">{{$errors->first('car_photo')}}</span> @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input value="{{$car->car_no}}" type="text" name="car_no" class="form-control @if($errors->has('car_no')) is-invalid @endif" placeholder="Car No">
                                                                            @if($errors->has('car_no'))<span class="invalid-feedback">{{$errors->first('car_no')}}</span> @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input value="{{$car->car_modal}}" type="text" name="car_modal" class="form-control @if($errors->has('car_modal')) is-invalid @endif" placeholder="Car Modal">
                                                                            @if($errors->has('car_modal'))<span class="invalid-feedback">{{$errors->first('car_modal')}}</span> @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input value="{{$car->car_company}}" type="text" name="car_company" class="form-control @if($errors->has('car_company')) is-invalid @endif" placeholder="Car Company">
                                                                            @if($errors->has('car_company'))<span class="invalid-feedback">{{$errors->first('car_company')}}</span> @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <select name="driver_id" class="form-control custom-select @if($errors->has('driver_id')) is-invalid @endif">
                                                                                <option></option>
                                                                                @foreach($drivers as $driver)
                                                                                    <option value="{{$driver->id}}" @if($car->Driver->id == $driver->id) selected @endif><i>({{$driver->id}})</i> {{$driver->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @if($errors->has('driver_id'))<span class="invalid-feedback">{{$errors->first('driver_id')}}</span> @endif
                                                                        </div>
                                                                        <div class="form-group form-check">
                                                                            <input @if($car->type) checked @endif name="type" type="checkbox" class="form-check-input" id="type" value=1>
                                                                            <label class="form-check-label" for="type">VIP</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-outline-primary btn-lg">Update</button>
                                                                    </div>
                                                                    {{@csrf_field()}}
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /edit car modal -->
                                                    <!-- delete car modal -->
                                                    <div class="modal fade" id="d{{$car->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Car</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <span>Are you sure want to delete <em>{{$car->car_no}}</em> permanently?</span>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <a class="btn btn-primary" href="{{route('get.carDelete',['car_id'=>$car->id])}}">Confirm</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /delete car modal -->
                                                </td>
                                            </tr>
                                        @endif
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="table table-responsive">
                            <h3 class="d-inline text-secondary"><em>Modifying Cars</em></h3>
                            <span class="float-right text-warning mb-2"><i class="fa fa-exclamation-triangle fa-2x"></i> </span>
                            <table class="table-hover" width="100%">
                                <thead style="background: #d39e00;">
                                    <tr>
                                        <th>Photo</th>
                                        <th>Car NO</th>
                                        <th>Type</th>
                                        <th>Duration</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cs as $car)
                                        <tr>
                                            <td><a href="#" data-toggle="modal" data-target="#cs{{$car->id}}"><img alt="coming soon" class="img img-size-50" src="{{route('image',['image_name'=>$car->car_photo_name])}}"></a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="cs{{$car->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="{{route('image',['image_name'=>$car->car_photo_name])}}" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$car->car_no}}</td>
                                            <td>@if($car->type) VIP @else Normal @endif</td>
                                            <td>{{$car->updated_at->diffForHumans($dt)}}</td>
                                            <td><a class="btn btn-outline-success" href="{{route('get.carState',['car_id'=>$car->id])}}"  data-toggle="tooltip" title="fine"><i class="fas fa-check-circle"></i></a></td>
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
