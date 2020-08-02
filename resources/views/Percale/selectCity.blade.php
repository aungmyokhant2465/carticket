@extends('Components.master')

@Section('title')
    Select City for percale
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
                            <li class="breadcrumb-item active">Select City</li>
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
                    <div class="col-10 offset-1">
                        <form method="post" action="{{route('post.selected.city')}}" >
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Select Cities</div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="to">To (City)</label>
                                        <select name="to" id="to" required class="form-control custom-select">
                                            <option></option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->City_name}}  ({{$city->State}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group float-right">
                                        <button type="submit" class="btn btn-outline-info btn-lg">Next <i class="fa fa-arrow-circle-right"></i></button>
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
