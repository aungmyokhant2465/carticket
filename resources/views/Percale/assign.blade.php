@extends('Components.master')

@Section('title')
    Assign Percale
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
                            <li class="breadcrumb-item active">Assign Percale</li>
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
                        <form method="post" action="{{route('post.assign.percale')}}">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Assign Percale</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="t_name">Transmitter's name</label>
                                                <input type="text" name="transmitter_name" id="t_name" class="form-control @if($errors->has('transmitter_name')) is-invalid @endif">
                                                @if($errors->has('transmitter_name'))<span class="invalid-feedback">{{$errors->first('transmitter_name')}}</span> @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="t_phone">Transmitter's phone</label>
                                                <input type="tel" name="transmitter_phone" id="t_phone" class="form-control @if($errors->has('transmitter_phone')) is-invalid @endif">
                                                @if($errors->has('transmitter_phone'))<span class="invalid-feedback">{{$errors->first('transmitter_phone')}}</span> @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="r_name">Receiver's name</label>
                                                <input type="text" name="receiver_name" id="r_name" class="form-control @if($errors->has('receiver_name')) is-invalid @endif">
                                                @if($errors->has('receiver_name'))<span class="invalid-feedback">{{$errors->first('receiver_name')}}</span> @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="r_phone">Receiver's phone</label>
                                                <input type="tel" name="receiver_phone" id="r_phone" class="form-control @if($errors->has('receiver_phone')) is-invalid @endif">
                                                @if($errors->has('receiver_phone'))<span class="invalid-feedback">{{$errors->first('receiver_phone')}}</span> @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="form-group">
                                                <label for="r_email">Receiver's email</label>
                                                <input type="email" name="receiver_email" id="r_email" class="form-control @if($errors->has('receiver_email')) is-invalid @endif">
                                                @if($errors->has('receiver_email'))<span class="invalid-feedback">{{$errors->first('receiver_email')}}</span> @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="to">To</label>
                                                <select name="to" id="to" class="form-control custom-select @if($errors->has('to')) is-invalid @endif">
                                                    <option></option>
                                                    @foreach($to as $t)
                                                        <option value="{{$t->id}}">{{$t->store_name}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('to'))<span class="invalid-feedback">{{$errors->first('to')}}</span> @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="type">Type</label>
                                                <input type="text" name="type" id="type" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="number" min="1" name="quantity" id="quantity" class="form-control @if($errors->has('quantity')) is-invalid @endif">
                                                @if($errors->has('quantity'))<span class="invalid-feedback">{{$errors->first('quantity')}}</span> @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="ship_fee">Ship Fee</label>
                                                <input type="number" min="1000" step="100" name="ship_fee" id="ship_fee" placeholder="MMK" class="form-control @if($errors->has('ship_fee')) is-invalid @endif">
                                                @if($errors->has('ship_fee'))<span class="invalid-feedback">{{$errors->first('ship_fee')}}</span> @endif
                                            </div>
                                        </div>
                                        <div class="col-2">

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group float-right">
                                        <button class="btn btn-outline-info btn-lg">Assign</button>
                                    </div>
                                </div>
                            </div>
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
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@stop
