@extends('Components.master')

@Section('title')
    Car Seat
@stop
@Section('styleSheet')
  <style>
      .seat {
          display: flex;
          flex-direction: column;
          border: 1px black solid;
          border-radius: 5px;
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
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" href="{{route('welcome')}}" >Dashboard</li>
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
                        <div class="card shadow-lg">
                            <dvi class="card-title">
                                <nav class="navbar navbar-light bg-light float-right">
                                    <ul class="nav justify-content-end">
                                        <li class="nav-item  mr-sm-2">
                                            <input min="5" max="15" type="number" id="row" placeholder="Row Number">
                                        </li>
                                        <li class="nav-item mr-sm-2">
                                            <button id="add4" class="btn btn-outline-info">4 Seat</button>
                                        </li>
                                        <li class="nav-item mr-sm-2">
                                            <button id="add5" class="btn btn-outline-info">5 Seat</button>
                                        </li>
                                    </ul>
                                </nav>
                            </dvi>
                            <div class="card-body">
                                <ul style="list-style: none" id="body">
                                    <li class="mb-3 seat4" id="seat_row4" style="display: flex; flex-direction: row">
                                        <div class="seat" style="width: 20%;">
                                            <span class="count"></span>
                                            <img src="{{URL::to('image/carSeat1.png')}}" width=100px>
                                        </div>
                                        <div class="seat" style="width: 20%;">
                                            <span class="count"></span>
                                            <img src="{{URL::to('image/carSeat1.png')}}" width=100px>
                                        </div>
                                        <div style="width: 20%;">

                                        </div>
                                        <div class="seat" style="width: 20%;">
                                            <span class="count"></span>
                                            <img src="{{URL::to('image/carSeat1.png')}}" width=100px>
                                        </div>
                                        <div class="seat" style="width: 20%;">
                                            <span class="count"></span>
                                            <img src="{{URL::to('image/carSeat1.png')}}" width=100px>
                                        </div>
                                    </li>
                                </ul>
                                <ul style="list-style: none" id="body1">
                                    <li class="mb-3 seat5" id="seat_row5" style="display: flex; flex-direction: row">
                                        <div class="seat" style="width: 20%;">
                                            <span class="count count5"></span>
                                            <img src="{{URL::to('image/carSeat1.png')}}" width=100px>
                                        </div>
                                        <div class="seat" style="width: 20%;">
                                            <span class="count count5"></span>
                                            <img src="{{URL::to('image/carSeat1.png')}}" width=100px>
                                        </div>
                                        <div class="seat" style="width: 20%;">
                                            <span class="count count5"></span>
                                            <img src="{{URL::to('image/carSeat1.png')}}" width=100px>
                                        </div>
                                        <div class="seat" style="width: 20%;">
                                            <span class="count count5"></span>
                                            <img src="{{URL::to('image/carSeat1.png')}}" width=100px>
                                        </div>
                                        <div class="seat" style="width: 20%;">
                                            <span class="count count5"></span>
                                            <img src="{{URL::to('image/carSeat1.png')}}" width=100px>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <form>
                            <div class="table-responsive">
                                <table class="table" id="carSeat">
                                    <thead>
                                    <th><input type="checkbox" id="checkAll"></th>
                                    <th>Id</th>
                                    <th>Car NO</th>
                                    <th>Car Modal</th>
                                    <th>Car Company</th>
                                    </thead>
                                    <tbody>
                                    @foreach($cars as $car)
                                        <tr>
                                            <td><input name="seat" type="checkbox" value="{{$car->id}}"></td>
                                            <td>{{$car->id}}</td>
                                            <td>{{$car->car_no}}</td>
                                            <td>{{$car->car_modal}}</td>
                                            <td>{{$car->car_company}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
@Section('script')
    <script>
        $(document).ready(function () {
            var i=1;
            var j=0;
            var body = $('#body');
            var body1= $('#body1');
            $('#add4').on('click',function () {
                $('#seat_row4').css({"display": "flex"});
                $('.seat5').css({"display": "none"});
                $('#seat_row5').css({"display": "flex"});
                while (body.children().length > 1){
                    body.children().eq(body.children().length-1).remove();
                }
                var row = $('#row').val()-1;
                while (i<row){
                    var seat_row = $('#seat_row4').clone().attr('id','');
                    body.append(seat_row);
                    i++;
                }
                while (j < $('.count').length){
                    $('.count').eq(j).html(j+1);
                    j++;
                }
                i=1;
                j=0;
            });
            var k=1;
            var l=0;
            $('#add5').on('click',function () {
                $('#seat_row5').css({"display": "flex"});
                $('.seat4').css({"display": "none"});
                while (body1.children().length > 1){
                    body1.children().eq(body1.children().length-1).remove();
                }
                var row = $('#row').val();
                while (k<row){
                    var seat_row = $('#seat_row5').clone().attr('id','');
                    body1.append(seat_row);
                    k++;
                }
                while (l < $('.count5').length){
                    $('.count5').eq(l).html(l+1);
                    l++;
                }
                k=1;
                l=0;
            });
            $(function () {
                $("#checkAll").on('click',function(){
                    if($(this).prop('checked')==true){
                        $('input[type=checkbox]').prop('checked',true);
                    }else{
                        $('input[type=checkbox]').prop('checked',false);
                    }
                })
            })
        });
    </script>
@stop
