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

        $platform = new Platform();
        $platform->PlatformName = $r->PlatformName;
        $platform->save();

        Session::flash('message','Platform added successfully!!');
        Session::flash('alert-class','alert-success');
        return redirect()->route('platform');

    }
//
//    public function update(Request $r)
//    {
//        //$userType=UserType::where('usertypeName','patient')->first();
//        $department = Department::findOrFail($r->DepartmentId);
//        $department->DepartmentName = $r->DepartmentName;
//
//        $department->save();
//        Session::flash('message','Department updates successfully!!');
//        Session::flash('alert-class','alert-success');
//    }
//
//    public function editPatient($id)
//    {
//        $department = Department::findOrFail($id);
//        return view('department.edit', compact('department'));
//    }

    public function showplatform(){
        $platformInfo = Platform::all();
        $datatables = DataTables::of($platformInfo);
        return $datatables->make(true);


    }

    public function deleteplatform(Request $r)
    {
        $platfrom = Platform::findorFail($r->PlatformId);
        $platfrom->delete();

    }

}
