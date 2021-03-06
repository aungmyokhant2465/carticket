<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class StoreController extends Controller
{
    public function  getStateAndCity(){
        $user = User::paginate(3);
        $city = City::get();
        return view('StateAndCity.stateAndCity')->with(['cities'=>$city, 'users'=>$user]);
    }

    public function postStateAndCity(Request $request){
        $city = new City();
        $city->City_name=$request['city_name'];
        $city->State=$request['state'];
        $city->save();
        return redirect()->back()->with("info","The City have been saved.");
    }

    public function postStateAndCityEdit(Request $request){
        $city = City::whereId($request['id'])->first();
        $city->city_Name = $request['city_Name'];
        $city->State = $request['State'];
        $city->update();
        return redirect()->back()->with('info','The City have been updated');
    }

    public function getStateAndCityDelete(Request $request){
        $city = City::whereId($request['id'])->firstOrFail();
        $city->delete();
        return redirect()->back()->with('info','The City have been deleted.');
    }

    public function getStoreAndUser($user_id){
        $user = User::whereId($user_id)->paginate(1);
        $city = City::get();
        $role = Role::get();
        return view("User.users")->with(['users'=>$user, 'city'=>$city, 'roles'=>$role]);
    }
}
