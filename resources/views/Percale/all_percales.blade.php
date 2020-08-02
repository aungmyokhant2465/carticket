@extends('Components.master')

@Section('title')
    All Percales
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
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Percales</li>
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
                        <div class="table-responsive">
                            <table class="table table-borderless" id="all_percales">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Transmitter Name</th>
                                        <th>Transmitter Phone</th>
                                        <th>Receiver Name</th>
                                        <th>Receiver Phone</th>
                                        <th>Receiver Email</th>
                                        <th>Type</th>
                                        <th>Quantity</th>
                                        <th>Shipping Fee</th>
                                        <th>Status</th>
                                        <th>Assigned at</th>
                                        <th>Member received date</th>
                                        <th>Received date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($percales as $percale)
                                        <tr>
                                            <td>{{$percale->id}}</td>
                                            <td>{{$percale->from}}</td>
                                            <td>{{$percale->to}}</td>
                                            <td>{{$percale->transmitter_name}}</td>
                                            <td>{{$percale->transmitter_phone}}</td>
                                            <td>{{$percale->receiver_name}}</td>
                                            <td>{{$percale->receiver_phone}}</td>
                                            <td>{{$percale->receiver_email}}</td>
                                            <td>{{$percale->type}}</td>
                                            <td>{{$percale->quantity}}</td>
                                            <td>{{$percale->shipping_fee}}</td>
                                            <td>
                                                @if($percale->received)
                                                    <span class="text-success">received</span>
                                                @elseif($percale->to_received)
                                                    <span class="text-secondary">Branch received</span>
                                                @else
                                                    <span class="text-warning">delivering</span>
                                                @endif
                                            </td>
                                            <td>{{$percale->assigned_at}}</td>
                                            <td>{{$percale->to_received_date}}</td>
                                            <td>{{$percale->received_date}}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#d{{$percale->id}}" class="btn btn-outline-danger btn-block"><i class="fa fa-trash"></i></a>
                                                <!-- remove percale modal -->
                                                <div class="modal fade" id="d{{$percale->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Remove Percale</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <span>Are you sure want to delete ID:<em>{{$percale->id}}</em> permanently?</span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <a class="btn btn-primary" href="{{route('get.delete.percale',['id'=>$percale->id])}}">Confirm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /remove percale modal -->
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

