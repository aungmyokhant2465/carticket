@extends('Components.master')

@Section('title')
    Add Travel Time
@stop
@section('styleSheet')
    <style>
        .tt  {
            border-right: 1px solid black;
        }
    </style>
@stop
@Section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><a href="{{route('get.travels')}}" class="btn btn-outline-secondary"><i class="fa fa-map"></i></a></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="{{route("welcome")}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Travel Time</li>
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
                        <form method="post" action="{{route('post.addTravelTime')}}">
                            <div class="row">
                                <div class="col-10"></div>
                                <div class="col-2">
                                    <button style="top: 3px; right: 2px;" class="mb-3 btn btn-outline-info btn-block btn-lg">Save</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <h3 class="text-secondary"><em>Travel Main Cities</em></h3>
                                </div>
                                <div class="col-4">
                                    <h3 class="text-secondary"><em> By Car</em></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="row">
                                        <div class="table table-responsive">
                                            <table class="table-active w-100">
                                                <thead>
                                                <tr>
                                                    <th><label>Form</label></th>
                                                    <th class="tt"><label for="start_time">Time</label></th>
                                                    <th><label>To</label></th>
                                                    <th><label for="stop_time">Time</label></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <label for="duration_start">{{$travel->start_city}}</label>
                                                    </td>
                                                    <td class="tt">
                                                        <dvi class="form-group">
                                                            <input name="start_time" id="duration_start" type="text" class="form-control duration dur @if($errors->has('start_time')) is-invalid @endif"/>
                                                            @if($errors->has('start_time'))<span class="invalid-feedback">{{$errors->first('start_time')}}</span> @endif
                                                        </dvi>
                                                    </td>
                                                    <td>
                                                        <label for="duration_stop">{{$travel->stop_city}}</label>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <input name="stop_time" id="duration_stop" type="text" class="form-control duration dur @if($errors->has('stop_time')) is-invalid @endif"/>
                                                                @if($errors->has('stop_time'))<span class="invalid-feedback">{{$errors->first('stop_time')}}</span> @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <ul style="list-style-type: none" class="list-group w-100" id="medium_ul">
                                            @foreach($medium as $m)
                                                @if($m)
                                                    <li class="list-group-item shadow m-2">
                                                        <div class="row">
                                                            <div class="col-5 pt-4">
                                                                {{$m}}
                                                            </div>
                                                            <div class="col-7">
                                                                <dvi class="form-group">
                                                                    <label>Time</label>
                                                                    <input name="t{{$m}}" type="text" class="form-control duration"/>
                                                                </dvi>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endif
                                                @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="car_select_table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Photo</th>
                                                    <th>Car NO</th>
                                                    <th>Driver</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cars as $car)
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="radio" name="car_id" value="{{$car->id}}" class="form-control @if($errors->has('car_id')) is-invalid @endif">
                                                                    @if($errors->has('car_id'))<span class="invalid-feedback">{{$errors->first('car_id')}}</span> @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><img src="{{route('image',['image_name'=>$car->car_photo_name])}}" class="img img-size-64"></td>
                                                    <td>{{$car->car_no}}</td>
                                                    <td>{{$car->Driver->name}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="medium" value="{{$travel->medium_city}}">
                            <input type="hidden" name="travel_id" value="{{$travel->id}}">
                            {{csrf_field()}}
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
                <div class="row">
                    <div class="col-10 offset-1 text-center">
                        <dvi style="display: none; position: fixed; bottom: 100px; left: 0; right: 0;" id="warn" class="alert alert-warning" role="alert">
                            <span>Start time and arrived time are same. </span>
                        </dvi>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@stop
@section('script')
    <script>
        $(document).ready(function () {
            $('.dur').on("change",function () {
                if($('#duration_start').val() == $('#duration_stop').val()){
                    $('#warn').css("display", "block")
                }else {
                    $('#warn').css("display", "none")
                }
            });
            //var ulLength = $("#medium_ul").children().length;
            //var uls = $("#medium_ul").children();
            //for(var i=0; i< ulLength; i++){
                //uls.eq(i).attr("name",i+"/medium_city");
                //console.log(uls.eq(i).attr('name'));
            //}
        });
    </script>
@stop

