<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DriverController extends Controller
{
    public function getAddDriver(){
        return view("Driver.addDrivers");
    }
    public function postAddDriver(Request $request){
        $this->validate($request,[
           "name"=>'required',
           "email"=>'required|email|unique:drivers',
           "age"=>'required',
           "address"=>'required',
           "phone"=>'required|min:8',
           "nrc"=>'required',
           "nrc_prefix"=>'required',
           "full"=>'required',
            "image"=>'required|mimes:jpg,png,jpeg,gif',
            "fnrc"=>'required|mimes:jpg,gif,png,jpeg',
            "bnrc"=>'required|mimes:jpg,gif,png,jpeg'
        ]);
        $driver = new Driver();
        $driver->name = $request['name'];
        $driver->email = $request['email'];
        $driver->age = $request['age'];
        $driver->phone = $request['phone'];
        $driver->address = $request['address'];
        $driver->nrc = $request['full'];
        $photo_name=date('d.m.y.h.i.s').'.'.$request->file('image')->getClientOriginalName();
        $fnrc_name=date('d.m.y.h.i.s').'.'.$request->file('fnrc')->getClientOriginalName();
        $bnrc_name=date('d.m.y.h.i.s').'.'.$request->file('bnrc')->getClientOriginalName();
        Storage::disk('images')->put($photo_name,File::get($request->file('image')));
        Storage::disk('images')->put($fnrc_name,File::get($request->file('fnrc')));
        Storage::disk('images')->put($bnrc_name,File::get($request->file('bnrc')));
        $driver->photo_name= $photo_name;
        $driver->nrc_font_photo_name= $fnrc_name;
        $driver->nrc_back_photo_name= $bnrc_name;
        $driver->save();
        return redirect()->back()->with("info","Successfully, This Driver have been saved.");
    }

    public function getDrivers(){
        $driver = Driver::get();
        return view('Driver.drivers')->with(['drivers'=>$driver]);
    }

    public function  getDriver($driver_id){
        $driver = Driver::whereId($driver_id)->firstOrFail();
        return view('Driver.driver')->with(['driver'=>$driver]);
    }

    public function getEditDriver($driver_id){
        $driver = Driver::whereId($driver_id)->firstOrFail();
        return view('Driver.editDriver')->with(['driver'=>$driver]);
    }

    public function postEditDriver(Request $request){
        $this->validate($request,[
            "name"=>'required',
            "email"=>'unique:drivers',
            "age"=>'required',
            "address"=>'required',
            "phone"=>'required|min:8',
            "nrc"=>'required',
            "nrc_prefix"=>'required',
            "full"=>'required',
            "type"=>'required',
            "image"=>'mimes:jpg,png,jpeg,gif',
            "fnrc"=>'mimes:jpg,gif,png,jpeg',
            "bnrc"=>'mimes:jpg,gif,png,jpeg'
        ]);
        $driver = Driver::whereId($request['driver_id'])->first();
        $driver->name = $request['name'];
        if($request['email']){
            $driver->email = $request['email'];
        }
        $driver->age = $request['age'];
        $driver->phone = $request['phone'];
        $driver->address = $request['address'];
        $driver->nrc = $request['full'];
        $driver->type = $request['type'];
        if($request['image']){
            $photo_name=date('d.m.y.h.i.s').'.'.$request->file('image')->getClientOriginalName();
            Storage::disk('images')->put($photo_name,File::get($request->file('image')));
            $driver->photo_name= $photo_name;
        }
        if($request['fnrc']){
            $fnrc_name=date('d.m.y.h.i.s').'.'.$request->file('fnrc')->getClientOriginalName();
            Storage::disk('images')->put($fnrc_name,File::get($request->file('fnrc')));
            $driver->nrc_font_photo_name= $fnrc_name;
        }
        if($request['bnrc']){
            $bnrc_name=date('d.m.y.h.i.s').'.'.$request->file('bnrc')->getClientOriginalName();
            Storage::disk('images')->put($bnrc_name,File::get($request->file('bnrc')));
            $driver->nrc_back_photo_name= $bnrc_name;
        }
        $driver->update();
        return redirect()->route('get.driver',['driver_id'=>$request['driver_id']])->with("info","Successfully, This Driver have been changed.");
    }

    public function getDeleteDriver(Request $request){
        $driver = Driver::whereId($request['driver_id'])->firstOrFail();
        $driver->delete();
        Storage::disk('images')->delete($request['photo']);
        Storage::disk('images')->delete($request['fnrc']);
        Storage::disk('images')->delete($request['bnrc']);
        return redirect()->route('get.drivers')->with('info',"The driver have been deleted.");
    }
}
