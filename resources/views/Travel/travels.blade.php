@extends('Components.master')

@Section('title')
   Travels
@stop
@Section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{route('get.addTravel')}}" class="btn btn-outline-secondary"><i class="fa fa-plus-square"></i></a>
                        <a href="{{route('get.travelsWithAndWithoutTime')}}" class="btn btn-outline-secondary">Travels <span style="font-size: 0.7em">With and Without Time</span></a>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Travels</li>
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
                        <div class="table table-responsive">
                            <table class="table table-hover" id="travels">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Car NO</th>
                                        <th>Start City</th>
                                        <th>Stop City</th>
                                        <th>Start Time</th>
                                        <th>Stop Time</th>
                                        <th>Medium Cities</th>
                                        <th>Medium Time (respectively)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($travel_times as $t)
                                        <tr>
                                            <td>{{$t->id}}</td>
                                            <td>{{$t->Car->car_no}}</td>
                                            <td>{{$t->Travel->start_city}}</td>
                                            <td>{{$t->Travel->stop_city}}</td>
                                            <td>{{$t->start_time}}</td>
                                            <td>{{$t->stop_time}}</td>
                                            <td>{{$t->Travel->medium_city}}</td>
                                            <td>{{$t->medium_time}}</td>
                                            <td>
                                                <div class="btn-group dropup">
                                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-cogs"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a href="{{route('get.editTravel',['travel_id'=>$t->Travel->id,'travelTime_id'=>$t->id])}}" class="dropdown-item btn-block text-info"><i class="fa fa-edit"> Edit</i></a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item btn-block text-danger" data-toggle="modal" data-target="#d{{$t->id}}"><i class="fa fa-trash"> Remove</i></a>
                                                    </div>
                                                </div>
                                                <!-- delete travel modal -->
                                                <div class="modal fade" id="d{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Travel</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <span>Are you sure want to delete travel <em>{{$t->id}}</em> permanently?</span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <a class="btn btn-primary" href="{{route('get.deleteTravel',['travel_id'=>$t->Travel->id,'travelTime_id'=>$t->id])}}">Confirm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /delete travel modal -->
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

