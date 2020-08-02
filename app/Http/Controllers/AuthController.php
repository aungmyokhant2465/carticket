<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function getWelcome(){
        return view('welcome');
    }

    public function getImage($image_name){
        $file = Storage::disk('images')->get($image_name);
        return response($file);
    }

    public function getAddUser(){
        $city =City::get();
        $roles =Role::all();
        return view('User.addUser')->with(['city'=>$city,'roles'=>$roles]);
    }

    public function postAddUser(Request $request){
        $this->validate($request,[
            'image'=>'required|mimes:jpg,jpeg,png,gif',
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'phone'=>'required',
            'shop_name'=>'required',
            'city'=>'required',
            'address'=>'required',
            'role'=>'required',
            'password'=>'required|min:5',
            'con_password'=>'required|same:password'
        ]);
        $user = new User();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->phone=$request['phone'];
        $user->store_name=$request['shop_name'];
        $user->city_id=$request['city'];
        $user->address=$request['address'];
        $user->password=bcrypt($request['password']);
        $image_name=date('d.m.y.h.i.s').'.'.$request->file('image')->getClientOriginalName();
        Storage::disk('images')->put($image_name,File::get($request->file('image')));
        $user->image_name=$image_name;
        $user->syncRoles($request['role']);
        $user->save();
        return redirect()->back()->with("info","The User have been saved.");
    }

    public function getUsers(){
        $users = User::paginate(3);
        return view('User.users')->with(["users"=>$users]);
    }

    public function getUserDelete(Request $request){
        $user = User::whereId($request['user_id'])->firstOrFail();
        $user->delete();
        Storage::disk("images")->delete($request['image_name']);
        return redirect()->back()->with('info',"The User have been deleted permanently.");
    }

    public function getUserEdit($user_id){
        $user = User::whereId($user_id)->firstOrFail();
        $city = City::get();
        $role = Role::get();
        return view('User.edit')->with(["user"=>$user,"city"=>$city, "roles"=>$role]);
    }

    public function postUserEdit(Request $request){
        $this->validate($request,[
            "name"=>"required",
            "email"=>"required|email",
            "phone"=>"required",
            'shop_name'=>'required',
            'city'=>'required',
            'address'=>'required',
            'role'=>'required',
            'password'=>'required|min:5',
            'con_password'=>'required|same:password'
        ]);
        $user = User::whereId($request['user_id'])->first();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->store_name = $request['shop_name'];
        $user->city_id = $request['city'];
        $user->address = $request['address'];
        $user->password = bcrypt($request['password']);
        if($request['image']){
            $image_name = date('d.m.y.h.i.s').'.'.$request->file('image')->getClientOriginalName();
            Storage::disk('images')->put($image_name,File::get($request->file('image')));
            Storage::disk('images')->delete($user->image_name);
            $user->image_name = $image_name;
        }
        $user->update();
        $user->syncRoles($request['role']);
        return redirect()->back()->with("info","The User have been updated.");
    }
    public function getLogin(){
        if(Auth::check()){
            return redirect()->route('welcome');
        }
        return view('User.login');
    }
    public function postLogin(Request $request){
        $remember = $request['remember']? true: false;
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['pass']],$remember)){
            return redirect()->route('welcome');
        }
        else{
            return redirect()->back()->with('info',"Authentication Error");
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('get.login');
    }
}
