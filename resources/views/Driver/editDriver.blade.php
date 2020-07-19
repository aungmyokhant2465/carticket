@extends('Components.master')

@Section('title')
    Edit Driver
@stop
@Section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><a href="{{route('get.driver',['driver_id'=>$driver->id])}}" class="btn btn-outline-secondary"><spa class="fa fa-backward"></spa></a></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('get.drivers')}}">Drivers</a></li>
                            <li class="breadcrumb-item"><a href="{{route('get.driver',['driver_id'=>$driver->id])}}">Driver</a></li>
                            <li class="breadcrumb-item active">Edit Driver</li>
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
                <form method="post" action="{{route('post.editDriver')}}" enctype="multipart/form-data">
                    <div class="col-12">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="hidden" name="driver_id" value="{{$driver->id}}">
                                        <div class="form-group">
                                            <label for="name">Driver's name</label>
                                            <input type="text" id="name" name="name" class="form-control @if($errors->has('name'))is-invalid @endif" value="{{$driver->name}}">
                                            @if($errors->has('name'))<span class="invalid-feedback">{{$errors->first("name")}}</span> @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control @if($errors->has("email"))is-invalid @endif">
                                            @if($errors->has("email"))<span class="invalid-feedback">{{$errors->first("email")}}</span> @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="age">Date of Birth</label>
                                            <input type="date" id="age" name="age" class="form-control @if($errors->has("age"))is-invalid @endif" value="{{$driver->age}}">
                                            @if($errors->has("age"))<span class="invalid-feedback">{{$errors->first("age")}}</span> @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="tel" name="phone" id="phone" class="form-control @if($errors->has("phone"))is-invalid @endif" value="{{$driver->phone}}">
                                            @if($errors->has("phone"))<span class="invalid-feedback">{{$errors->first("phone")}}</span> @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea name="address" id="address" class="form-control @if($errors->has('address'))is-invalid @endif">{{$driver->address}}</textarea>
                                            @if($errors->has("address"))<span class="invalid-feedback">{{$errors->first("address")}}</span> @endif
                                        </div>
                                        <div class="form-group">
                                            <label>NRC</label>
                                            <div class="input-group form-group">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span id="state_name">State</span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#" id="yangon">Yangon</a>
                                                        <a class="dropdown-item" href="#" id="pago">Pago</a>
                                                        <a class="dropdown-item" href="#" id="mon">Mon</a>
                                                    </div>
                                                    <div>
                                                        <select name="nrc_prefix" class="@if($errors->has('nrc_prefix')) is-invalid @endif custom-select mr-sm-2 btn btn-outline-secondary nrcPrefix" id="yan">
                                                            <option></option>
                                                            <option class="yan" value="a1">a1</option>
                                                            <option class="yan" value="a2">a2</option>
                                                            <option class="yan" value="a3">a3</option>
                                                            <option class="pa" value="b1">b1</option>
                                                            <option class="pa" value="b2">b2</option>
                                                            <option class="pa" value="b3">b3</option>
                                                            <option class="mo" value="c1">c1</option>
                                                            <option class="mo" value="c2">c2</option>
                                                            <option class="mo" value="c3">c3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <input placeholder="NRC number only" type="text" class="form-control @if($errors->has("nrc"))is-invalid @endif" aria-label="Text input with segmented dropdown button" name="nrc" id="nrc_no">
                                                @if($errors->has('nrc_prefix'))<span class="invalid-feedback">{{$errors->first('nrc_prefix')}}</span> @endif
                                                @if($errors->has('nrc'))<span class="invalid-feedback">{{$errors->first('nrc')}}</span> @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="image">Photo</label>
                                            <input type="file" id="image" name="image" class="form-control @if($errors->has('image'))is-invalid @endif">
                                            @if($errors->has('image'))<span class="invalid-feedback">{{$errors->first("image")}}</span> @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="fnrc">Font of NRC Cart</label>
                                            <input type="file" id="fnrc" name="fnrc" class="form-control @if($errors->has('fnrc'))is-invalid @endif">
                                            @if($errors->has('fnrc'))<span class="invalid-feedback">{{$errors->first("fnrc")}}</span> @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="bnrc">Bck of NRC Cart</label>
                                            <input type="file" id="bnrc" name="bnrc" class="form-control @if($errors->has('bnrc'))is-invalid @endif">
                                            @if($errors->has('bnrc'))<span class="invalid-feedback">{{$errors->first("bnrc")}}</span> @endif
                                        </div>
                                        <input type="hidden" id="full" name="full">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-outline-info btn-lg">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{@csrf_field()}}
                </form>
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
    <style>
        .yan,.pa,.mo {
            display: none;
        }
    </style>
@stop
@section("script")
    <script>
        var state_name= $("#state_name");
        var yangon= $("#yangon");
        var pago= $("#pago");
        var mon= $("#mon");
        yangon.on("click",function () {
            $(".yan").css("display","block");
            $(".pa").css("display","none");
            $(".mo").css("display","none");
            state_name.html("Yangon")
        });
        pago.on("click",function () {
            $(".yan").css("display","none");
            $(".pa").css("display","block");
            $(".mo").css("display","none");
            state_name.html("Pago")
        });
        mon.on("click",function () {
            $(".yan").css("display","none");
            $(".pa").css("display","none");
            $(".mo").css("display","block");
            state_name.html("Mon")
        });
        //
        var nrcInput = $("#nrc_no");
        var full = $("#full");
        var vl;
        var v;
        var fullNrc;
        $(".nrcPrefix").change(function () {
            vl = $(".nrcPrefix").children(":selected").val();
        });
        nrcInput.keyup(function () {
            v = nrcInput.val();
            fullNrc = vl + v;
            full.val(fullNrc);
        });
    </script>
@stop

