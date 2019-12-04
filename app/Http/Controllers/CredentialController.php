<?php

namespace App\Http\Controllers;

use App\Credential;
use App\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Session;


class CredentialController extends Controller
{
    public function index(){
        return view ('credential.credential');
    }

    public function insert(Request $r){



        $credential = new Credential();
        $credential->Email = $r->Email;
        $credential->Username = $r->Username;
        $credential->Password = $r->Password;
        $credential->RecoveryPhone = $r->RecoveryPhone;
        $credential->WhoElseHasAccess = $r->WhoElseHasAccess;
        $credential->WebsiteUrl = $r->WebsiteUrl;
        $credential->fkPlatformid = $r->PlatformId;
        $credential->save();

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

    public function showcredential(){
        $credentialinfo = Credential::select(DB::raw("(`platform`.`PlatformName`) as platformname"), 'fkPlatformid','credential.Email','credential.Username','credential.Password','credential.RecoveryPhone','credential.WhoElseHasAccess','credential.WebsiteUrl')
        ->leftjoin('platform','fkPlatformid','PlatformId')->get();
        $datatables = DataTables::of($credentialinfo);
        return $datatables->make(true);


    }

    public function deleteplatform(Request $r)
    {
        $platform = Platform::findorFail($r->PlatformId);
        $platform->delete();

    }

}
