<?php

namespace App\Http\Controllers;

use App\Cars;
use App\City;
use App\Travel_time;
use App\Travels;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function getAddTravel(){
        $cities = City::get();
        return view("Travel.addTravel",['cities'=>$cities]);
    }
    public function postAddTravel(Request $request){
        $this->validate($request,[
           'start_city'=>'required',
           'stop_city'=>'required',
        ]);
        $arr = [];
        for ($c=0;$c<$request['count'];$c++){
            $arr[$c]=$request[$c.'/medium_city'];
        }
        $stArr = implode(",",$arr);
        $travel = new travels();
        $travel->start_city = $request['start_city'];
        $travel->stop_city = $request['stop_city'];
        $travel->medium_city = $stArr;
        $travel->save();
        return redirect()->route("get.addTravelTime",["travel_id"=>$travel->id])->with('info',"Successfully, A Travel have been saved.");
    }
    public function getAddTravelTime($travel_id){
        $cars = Cars::get();
        $travel = Travels::whereId($travel_id)->firstOrFail();
        $medium = explode(",",$travel->medium_city);
        return view('Travel.addTravelTime')->with(['cars'=>$cars,'travel'=>$travel,'medium'=>$medium]);
    }
    public function postAddTravelTime(Request $request){
        $this->validate($request,[
            'start_time'=>'required',
            'stop_time'=>'required',
            'car_id'=>'required',
        ]);
        $medium = explode(',',$request['medium']);
        $mArray = array();
        $i = 0;
        while ($i < count($medium)){
            $mArray[]=$request['t'.$medium[$i]];
            $i++;
        }
        $medium_times= implode(",",$mArray);
        $travel_time = new travel_time();
        $travel_time->start_time = $request['start_time'];
        $travel_time->stop_time = $request['stop_time'];
        $travel_time->medium_time = $medium_times;
        $travel_time->car_id = $request['car_id'];
        $travel_time->travel_id = $request['travel_id'];
        $travel_time->save();
        $travel = Travels::whereId($request['travel_id'])->first();
        $travel->travel_time_id = $travel_time->id;
        $travel->update();
        return redirect()->back()->with('info',"The time table have been saved.");
    }
    public function getTravels(){
        $travel_times = Travel_time::get();
        return view('Travel.travels')->with(['travel_times'=>$travel_times]);
    }
    public function getDeleteTravel($travel_id, $travelTime_id){
        $travel = Travels::whereId($travel_id)->firstOrFail();
        $travelTime = Travel_time::whereId($travelTime_id)->firstOrFail();
        //$travel->delete();
        $travelTime->delete();
        return redirect()->back()->with('info',"The travel ".$travelTime_id." have been deleted.");
    }
    public function getEditTravel($travel_id,$travelTime_id){
        $cities = City::get();
        $travel = travels::whereId($travel_id)->firstOrFail();
        return view('Travel.editTravel')->with(['cities'=>$cities,'travel'=>$travel,'travelTime_id'=>$travelTime_id]);
    }
    public function postEditTravel(Request $request){
        $this->validate($request,[
            'start_city'=>'required',
            'stop_city'=>'required',
        ]);
        $arr = [];
        for ($c=0;$c<$request['count'];$c++){
            $arr[$c]=$request[$c.'/medium_city'];
        }
        $stArr = implode(",",$arr);
        $travel = Travels::whereId($request['travel_id'])->first();
        $travel->start_city = $request['start_city'];
        $travel->stop_city = $request['stop_city'];
        if($stArr){
            $travel->medium_city = $stArr;
        }
        $travel->update();
        return redirect()->route("get.editTravelTime",["travelTime_id"=>$request['travelTime_id'],"travel_id"=>$travel->id])->with('info',"Successfully, A Travel have been updated.");
    }
    public function getEditTravelTime($travelTime_id, $travel_id){
        $cars = Cars::get();
        $mt = array();
        $travel = Travels::whereId($travel_id)->firstOrFail();
        $travelTime = Travel_time::whereId($travelTime_id)->firstOrFail();
        if($travel->medium_city){
            $medium= explode(",",$travel->medium_city);
            $medium_time = explode(",",$travelTime->medium_time);
            for($i=0; $i<count($medium);$i++){
                if($i < count($medium_time)){
                    $mt[$i]['time']=$medium_time[$i];
                }else{
                    $mt[$i]['time']=null;
                }
                $mt[$i]['city']=$medium[$i];
            }
        }
        return view('Travel.editTravelTime')->with(['cars'=>$cars,'travel'=>$travel,'mediums'=>$mt,'travelTime'=>$travelTime]);
    }
    public function postEditTravelTime(Request $request){
        $this->validate($request,[
            'start_time'=>'required',
            'stop_time'=>'required',
            'car_id'=>'required',
        ]);
        $medium = explode(',',$request['medium']);
        $mArray = array();
        $i = 0;
        while ($i < count($medium)){
            $mArray[]=$request['t'.$medium[$i]];
            $i++;
        }
        $medium_times= implode(",",$mArray);
        $travel_time =Travel_time::whereId($request['travelTime_id'])->first();
        $travel_time->start_time = $request['start_time'];
        $travel_time->stop_time = $request['stop_time'];
        $travel_time->medium_time = $medium_times;
        $travel_time->car_id = $request['car_id'];
        $travel_time->travel_id = $request['travel_id'];
        $travel_time->update();
        return redirect()->route('get.travels')->with('info',"Successfully, The time table have been updated.");
    }

    public function getTravelWithoutTime() {
        $travels_without_time = Travels::where('travel_time_id',null)->get();
        $travels = Travels::where('travel_time_id','!=',null)->get();
        return view('Travel.travelWithoutTime')->with(['travels_without_time'=>$travels_without_time, 'travels'=>$travels]);
    }

    public function getEditTravelWithoutTime($travel_id) {
        $cities = City::get();
        $travel = Travels::whereId($travel_id)->first();
        return view('Travel.editTravel')->with(['cities'=>$cities,'travel'=>$travel]);
    }

    public function postEditTravelWithoutTime(Request $request) {
        $this->validate($request,[
            'start_city'=>'required',
            'stop_city'=>'required',
        ]);
        $arr = [];
        for ($c=0;$c<$request['count'];$c++){
            $arr[$c]=$request[$c.'/medium_city'];
        }
        $stArr = implode(",",$arr);
        $travel = Travels::whereId($request['travel_id'])->first();
        $travel->start_city = $request['start_city'];
        $travel->stop_city = $request['stop_city'];
        if($stArr){
            $travel->medium_city = $stArr;
        }
        $travel->update();
        return redirect()->route("get.travelsWithAndWithoutTime")->with('info',"Successfully, A Travel have been updated.");
    }

    public function  getDeleteTravelWithoutTime($travel_id) {
        $travel = Travels::whereId($travel_id)->firstOrFail();
        $travel->delete();
        return redirect()->back()->with('info',"The travel ".$travel_id." have been deleted.");
    }
}
