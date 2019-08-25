<?php

namespace App\Http\Controllers;

use App\CustomClass\UserData;
use App\SiteProfile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{
    public function index(){
        return view('admin.user')->with([
            'url' => 'user'
        ]);
    }

    public function userStore(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create($request->all());
        return response()->json(true);
    }

    public function userData(){
        $users=User::where('type','!=','admin')->orderBy('id','Desc')->get();
        $user_datas=UserData::getAllUserData($users);
        return response()->json($user_datas);
    }

    public function selectedData($selected_data){
        if($selected_data == 'transport'){
            $users= User::where('type','transport')->orderBy('id','Desc')->get();
            $user_datas=UserData::getAllUserData($users);
            return response()->json($user_datas);
        }else{
            $users= User::where('type','freight')->orderBy('id','Desc')->get();
            $user_datas=UserData::getAllUserData($users);
            return response()->json($user_datas);
        }
    }

    public function userDestroy($id){
        $delete=User::find($id);
        $delete->delete();
        return response()->json(true);
    }
    
    public function changeUserPassword(Request $request){
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $update=User::find($request->id);
        $update->password=Hash::make($request->get('password'));
        Session::flash('success','Change Password Successful');
        $update->update();
        return redirect()->back();
    }

    //-------------------------------------Site Profile------------------------------
    public function siteProfile(){
        $site_profile=SiteProfile::first();
        return view('admin.site_profile')->with([
            'site_profile' => $site_profile,
            'url' => 'site_profile'
        ]);
    }

    public function changeSiteProfile(Request $request){
        $update=SiteProfile::find($request->get('id'));
        $update->update($request->all());
        Session::flash('success','Successful');
        return redirect()->back();
    }
}
