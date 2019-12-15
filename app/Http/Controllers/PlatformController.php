<?php

namespace App\Http\Controllers;

use App\Platform;
use Illuminate\Http\Request;
use Session;
use Yajra\DataTables\DataTables;


class PlatformController extends Controller
{
    public function index(){
        return view('platform.platform');
    }

    public function insert(Request $r){

        $rules = [
            'PlatformName' => 'required|regex:/^[a-zA-Z]+$/u|max:255|',

        ];
        $this->validate($r, $rules);

        $platform = new Platform();
        $platform->PlatformName = $r->PlatformName;
        $platform->save();

        Session::flash('message','Platform added successfully!!');
        Session::flash('alert-class','alert-success');
        return redirect()->route('platform');

    }

    public function edit_platform(Request $r){

        $platform = Platform::find($r->PlatformId);

        return view('platform.platform_update')->with('platform', $platform);
    }

    public function update_platform(Request $r){

        $rules = [
            'PlatformName' => 'required|regex:/^[a-zA-Z]+$/u|max:255|',

        ];
        $this->validate($r, $rules);


        $platform = Platform::find($r->PlatformId);
        $platform->PlatformName = $r->PlatformName;
        $platform->save();
        Session::flash('message', 'Platform Updated!');
        return back();
    }


    public function showplatform(){
        $platformInfo = Platform::all();
        $datatables = DataTables::of($platformInfo);
        return $datatables->make(true);


    }

    public function deleteplatform(Request $r)
    {
        $platform = Platform::findorFail($r->PlatformId);
        $platform->delete();

    }

}
