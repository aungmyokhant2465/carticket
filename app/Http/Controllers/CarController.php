<?php

namespace App\Http\Controllers;

use App\Cars;
use App\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CarController extends Controller
{
    public function getCars(){
        $dt = Carbon::now();
        $divers = Driver::get();
        $cars = Cars::OrderBy('id','desc')->paginate(2);
        $cs = Cars::whereState(false)->get();
        return view('Car.cars')->with(['drivers'=>$divers,"cars"=>$cars,"cs"=>$cs,"dt"=>$dt]);
    }
    public function postAddCar(Request $request){
        $this->validate($request,[
            'car_photo'=>'required|mimes:png,jpeg,gif,jpg',
            'car_no'=>'required',
            'car_modal'=>'required',
            'car_company'=>'required',
            'driver_id'=>'required'
        ]);
        $car = new Cars();
        $car->car_no=$request['car_no'];
        $car->car_modal=$request['car_modal'];
        $car->car_company=$request['car_company'];
        $car->driver_id=$request['driver_id'];
        $car->type=$request['type'];
        $car_photo_name = date('y.m.d.h.i.s').'.'.$request->file('car_photo')->getClientOriginalName();
        Storage::disk('images')->put($car_photo_name, File::get($request->file('car_photo')));
        $car->car_photo_name=$car_photo_name;
        $car->state=true;
        $car->save();
        return redirect()->back()->with('info',"Car have been saved.");
    }
    public function getCarState($car_id){
        $car = Cars::whereId($car_id)->firstOrFail();
        if($car->state){
            $car->state = false;
        }else{
            $car->state=true;
        }
        $car->update();
        return redirect()->back();
    }
    public function postCarEdit(Request $request){
        $this->validate($request,[
            'car_photo'=>'mimes:jpg,png,jpeg,gif',
            'car_no'=>'required',
            'car_modal'=>'required',
            'car_company'=>'required',
            'driver_id'=>'required'
        ]);
        $car= Cars::whereId($request['car_id'])->first();
        $car->car_no=$request['car_no'];
        $car->car_modal=$request['car_modal'];
        $car->car_company=$request['car_company'];
        $car->driver_id=$request['driver_id'];
        $car->type=$request['type'];
        if($request['car_photo']){
            $car_photo_name = date('y.m.d.h.i.s').'.'.$request->file('car_photo')->getClientOriginalName();
            Storage::disk('images')->put($car_photo_name, File::get($request->file('car_photo')));
        }
        $car->update();
        return redirect()->back()->with("info","The Car have been edited.");

    }
    public function getCarDelete($car_id){
        $car = Cars::where('id',$car_id)->firstOrFail();
        $car->delete();
        Storage::disk('images')->delete($car->car_photo_name);
        return redirect()->back()->with('info','The Car '.$car->car_no.' have been deleted.');
    }
    public function getSearch(Request $request){
        $dt = Carbon::now();
        $divers = Driver::get();
        $search = $request['search'];
        $cars = Cars::where('id','LIKE',"%$search%")->orWhere('car_no','LIKE',"%$search%")->orWhere('car_modal','LIKE',"%$search%")->orWhere('car_company','LIKE',"%$search%")->paginate(1);
        $cs = Cars::whereState(false)->get();
        return view('Car.cars')->with(['drivers'=>$divers,"cars"=>$cars,"cs"=>$cs,"dt"=>$dt]);
    }
    public function getCarSeat(){
        $cars = Cars::get();
        return view('Car.carSeat')->with(['cars'=>$cars]);
    }
}
