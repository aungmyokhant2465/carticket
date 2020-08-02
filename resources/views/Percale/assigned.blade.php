@extends('Components.master')

@Section('title')
    Assigned Percales
@stop
@Section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <form class="form-inline" method="get" action="{{route('percales.byDate')}}">
                            <div class="form-group">
                                <input name="date" required value="" class="form-control mr-sm-2" type="date" placeholder="Search by date" aria-label="Search by date">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Assigned Percales</li>
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
                        <router-view :key="$route.fullPath" :percales="{{$percales}}"></router-view>
                        <div class="accordion" id="accordion">
                            @foreach($percales as $percale)
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0 d-inline-block w-75">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#p{{$percale->id}}" aria-expanded="false" aria-controls="collapseTwo">
                                                {{$percale->receiver_name}}
                                            </button>
                                        </h2>
                                        <a href="#" data-toggle="modal" data-target="#c{{$percale->id}}" class="float-right">
                                            @if($percale->received)
                                                <span class="text-success">received</span>
                                            @elseif($percale->to_received)
                                                <span class="text-secondary">Branch received</span>
                                            @else
                                                <span class="text-warning">delivering</span>
                                            @endif
                                        </a>
                                    </div>
                                    <div id="p{{$percale->id}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>From :</td>
                                                    <td>{{$percale->from}}</td>
                                                    <td>To :</td>
                                                    <td>{{$percale->id}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Transmitter's name :</td>
                                                    <td>{{$percale->transmitter_name}}</td>
                                                    <td>Receiver's name :</td>
                                                    <td>{{$percale->receiver_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Transmitter's phone :</td>
                                                    <td><em>{{$percale->transmitter_phone}}</em></td>
                                                    <td>Receiver's phone :</td>
                                                    <td><em>{{$percale->receiver_phone}}</em></td>
                                                </tr>
                                                <tr>
                                                    <td>Member received Date :</td>
                                                    <td><time>{{$percale->to_received_date}}</time></td>
                                                    <td>Received Date :</td>
                                                    <td><time>{{$percale->received_date}}</time></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- status modal -->
                                <div class="modal fade" id="c{{$percale->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <a class="btn btn-primary" href="#">Confirm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /status modal -->
                                @endforeach
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
