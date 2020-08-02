<?php

namespace App\Http\Controllers;

use App\City;
use App\Percale;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PercaleController extends Controller
{
    public function getAllPercales(){
        $percales = Percale::where('assigned_at',date('y-m-d'))->get();
        return view('Percale.all_percales')->with(['percales'=>$percales]);
    }

    public function searchByDate(Request $request){
        $percales = Percale::where('assigned_at',$request['date'])->get();
        return view('Percale.all_percales')->with(['percales'=>$percales]);
    }

    public function getSelectCity(){
        $cities = City::OrderBy('City_name')->get();
        return view('Percale.selectCity')->with(['cities'=>$cities]);
    }

    public function postSelectedCity(Request $request){
        return redirect()->route('get.assign.percale',['to'=>$request['to']]);
    }

    public function getAssignPercale($to){
        $to_shops = User::where('city_id',$to)->get();
        return view('Percale.assign')->with(['to'=>$to_shops]);
    }

    public function postAssignPercale(Request $request){
        $this->validate($request,[
            'to'=>'required',
            'transmitter_name'=>'required',
            'receiver_name'=>'required',
            'transmitter_phone'=>'required',
            'receiver_phone'=>'required',
            'receiver_email'=>'required|email',
            'quantity'=>'required',
            'ship_fee'=>'required'
        ]);
        $percale = new Percale();
        $percale->from = Auth::id();
        $percale->to = $request['to'];
        $percale->transmitter_name = $request['transmitter_name'];
        $percale->transmitter_phone = $request['transmitter_phone'];
        $percale->receiver_name = $request['receiver_name'];
        $percale->receiver_phone = $request['receiver_phone'];
        $percale->receiver_email = $request['receiver_email'];
        $percale->type = $request['type'];
        $percale->quantity = $request['quantity'];
        $percale->shipping_fee = $request['ship_fee'];
        $percale->assigned_at = date('y-m-d');
        $percale->save();
        return redirect()->back()->with('info',"Percale have been assigned.");
    }

    public function getDeletePercale($id){
        $percale = Percale::whereId($id)->firstOrFail();
        $percale->delete();
        return redirect()->back()->with('info','Percale have been removed.');
    }

    public function getAssigned() {
        $percales = Percale::where('from',Auth::id())->get();
        return view('Percale.assigned')->with(['percales'=>$percales]);
    }
}
