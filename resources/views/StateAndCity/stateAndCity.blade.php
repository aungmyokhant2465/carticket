@extends('Components.master')
@Section('title')
    stateAndCity
@stop
@Section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">State and City</li>
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
                    <div class="col-7">
                        <div class="table table-responsive">
                            <table class="table table-borderless table-hover" id="storeTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Shop name</th>
                                        <th>Owner's name</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->City->id}}</td>
                                            <td>{{$user->store_name}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->City->City_name}}</td>
                                            <td>{{$user->City->State}}</td>
                                            <td><a class="btn btn-outline-secondary" href="{{route('get.storeAndUser',['user_id'=>$user->id])}}"><i class="fas fa-info-circle"></i></a></td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-borderless" id="cityTable">
                                        <thead>
                                        <th>ID</th>
                                        <th>City Name</th>
                                        <th>State</th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody>
                                        @foreach($cities as $city)
                                            <tr>
                                                <td>{{$city->id}}</td>
                                                <td>{{$city->City_name}}</td>
                                                <td>{{$city->State}}</td>
                                                <td>
                                                    <div class="row">
                                                        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#e{{$city->id}}"><i class="fa fa-edit"></i></a>
                                                        <!--Edit Modal -->
                                                        <div class="modal fade" id="e{{$city->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <form action="{{route('post.stateAndCityEdit')}}" method="post">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Edit City</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="id" value="{{$city->id}}">
                                                                            <div class="form-group">
                                                                                <label for="city_Name">City name</label>
                                                                                <input class="form-control @if($errors->has("city_Name")) is-invalid @endif" name="city_Name" id="city_Name" value="{{$city->City_name}}">
                                                                                @if($errors->has('city_Name')) <span class="invalid-feedback"> {{$errors->first('city_Name')}}</span> @endif
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="State">State</label>
                                                                                <select name="State" id="State" class="form-control custom-select @if($errors->has('State')) is-invalid @endif">
                                                                                    <option></option>
                                                                                    <option>Mon</option>
                                                                                    <option>Yangon</option>
                                                                                    <option>Mandalay</option>
                                                                                    <option>Pago</option>
                                                                                </select>
                                                                                @if($errors->has('State')) <span class="invalid-feedback"> {{$errors->first('State')}}</span> @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <div class="form-group">
                                                                                <input type="submit" class="btn btn-outline-info" value="Update">
                                                                            </div>
                                                                        </div>
                                                                        {{csrf_field()}}
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#d{{$city->id}}"><i class="fa fa-trash"></i></a>
                                                        <!--Delete Modal -->
                                                        <div class="modal fade" id="d{{$city->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <form action="{{route('get.stateAndCityDelete')}}" method="get">
                                                                        <input type="hidden" name="id" value="{{$city->id}}">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete City</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <span>Are you sure want to delete <em>{{$city->City_name}}</em> permanently?</span>
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
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Add City</h3>
                                    </div>
                                    <div class="card-footer">
                                        <form action="{{route('post.stateAndCity')}}" method="post">
                                            <div class="form-group">
                                                <label for="city_name">City name</label>
                                                <input class="form-control @if($errors->has("city_name")) is-invalid @endif" name="city_name" id="city_name">
                                                @if($errors->has('city_name')) <span class="invalid-feedback"> {{$errors->first('city_name')}}</span> @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <select name="state" id="state" class="form-control custom-select @if($errors->has('state')) is-invalid @endif">
                                                    <option></option>
                                                    <option>Mon</option>
                                                    <option>Yangon</option>
                                                    <option>Mandalay</option>
                                                    <option>Pago</option>
                                                </select>
                                                @if($errors->has('state')) <span class="invalid-feedback"> {{$errors->first('state')}}</span> @endif
                                            </div>
                                            <div class="form-group text-right">
                                                <button type="submit" class="btn btn-outline-info">Save</button>
                                            </div>
                                            {{@csrf_field()}}
                                        </form>
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

