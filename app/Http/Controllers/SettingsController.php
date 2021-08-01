<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
class SettingsController extends Controller
{


    public function __construct(){

        $this->middleware('admin');

    }


    public function index(){

    return view('Settings.settings')->with('settings',Settings::first());


  }


     public function update(Request $request){


        $this->validate($request,[
            "blog_name"    => "required",
            "phone_number"  => "required",
            "blog_email"  => "required" ,
            "address"  => "required"

        ]);


        $setting = Settings::first();


        $setting->blog_name =  $request->blog_name;
        $setting->phone_number =  $request->phone_number;
        $setting->blog_email = $request->blog_email;
        $setting->address = $request->address;
        $setting->save();

        return redirect()->back();



    }











}
