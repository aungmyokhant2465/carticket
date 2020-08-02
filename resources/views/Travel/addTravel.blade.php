@extends('Components.master')

@Section('title')
    Add Travel
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
                        <h1 class="m-0 text-dark"><a href="{{route('get.travels')}}" class="btn btn-outline-secondary"><i class="fas fa-bars"></i></a></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Travel</li>
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
                        <form method="post" action="{{route('post.addTravel')}}">
                            <div class="row">
                                <div class="col-10"></div>
                                <div class="col-2">
                                    <button style="top: 3px; right: 2px;" type="submit" class="btn btn-outline-info btn-block btn-lg">Save</button>
                                </div>
                            </div>
                            <input type="hidden" name="count" id="hid" value="1">
                            <div class="row">
                                <div class="col-8">
                                    <h3 class="text-secondary"><em>Travel Main Cities</em></h3>
                                </div>
                                <div class="col-4">
                                    <h5 class="text-secondary"><em>Add Medium Cities</em></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="table table-responsive shadow-lg">
                                        <table class="table-active w-100">
                                            <thead>
                                                <tr>
                                                    <th class="tt"><label for="start_city">Form</label></th>
                                                    <th><label for="stop_city">To</label></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="tt">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <select class="form-control custom-select @if($errors->has('start_city')) is-invalid @endif" name="start_city" id="start_city">
                                                                    <option></option>
                                                                    @foreach($cities as $city)
                                                                        <option>{{$city->City_name}}</option>
                                                                        @endforeach
                                                                </select>
                                                                @if($errors->has('start_city'))<span class="invalid-feedback">{{$errors->first()}}</span>@endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <select class="form-control custom-select @if($errors->has('stop_city')) is-invalid @endif" name="stop_city" id="stop_city">
                                                                    <option></option>
                                                                    @foreach($cities as $city)
                                                                        <option>{{$city->City_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if($errors->has('stop_city'))<span class="invalid-feedback">{{$errors->first()}}</span>@endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div id="warp">
                                        <div class="card shadow-lg" id="card">
                                            <div class="card-body" id="card_body">
                                                <div class="form-group" id="form_group">
                                                    <select class="form-control custom-select" id="medium_city" name="0/medium_city">
                                                        <option></option>
                                                        @foreach($cities as $city)
                                                            <option>{{$city->City_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card shadow-lg w-25">
                                        <div class="card-body">
                                            <button type="button" id="add_medium_city" class="btn btn-block btn-light"><i class="fa fa-plus"></i></button>
                                        </div>
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

@push('script')
    <script>
        var cities;
        var i = 1;
        var warp = $('#warp');
        var card = $('#card');
        var card_body = $('#card_body');
        var form_group = $('#form_group');
        var select = $('#medium_city');
        $('#add_medium_city').on("click",function () {
            select.clone().attr('id','');
            var sel = select.clone().attr('name',i+"/medium_city");
            var ready = card.clone().html(card_body.clone().html(form_group.clone().html(sel)));
            warp.append(ready);
            //console.log(sel.attr("name"));
            i++;
            $('#hid').attr('value',i);
            //console.log($('#hid').attr('value'));
        })
    </script>
@endpush