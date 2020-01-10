<?php

namespace App\Http\Controllers;

use App\Credential;
use App\Department;
use App\Platform;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;
use Yajra\DataTables\DataTables;
use Session;


class CredentialController extends Controller
{


    public function index()
    {
        $users = User::all();
        $departments = Department::select('DepartmentName','DepartmentId')->get();
        $platforms = Platform::all();
        return view('credential.credential', compact('platforms', 'departments', 'users'));
    }

    public function getUsers($UserId){


        $users = User::where('fkDepartmentId',$UserId)->pluck('name','UserId');



        return json_encode($users);


//        $users = User::select('name','UserId')->get();
//        return json_encode($users);

    }

    public function insert(Request $r)
    {


        $credential = new Credential();
        $credential->Email = $r->Email;
        $credential->Username = $r->Username;
        $credential->Password = $r->Password;
        $credential->RecoveryPhone = $r->RecoveryPhone;
        $credential->WhoElseHasAccess = $r->WhoElseHasAccess;
        $credential->WebsiteUrl = $r->WebsiteUrl;
        $credential->fkPlatformid = $r->PlatformId;
        $credential->save();

        Session::flash('message', 'Credential added successfully!!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('credential');

    }

    public function save(Request $r){
        $role = new Role();

        $role->fkCredentialid =$r->Credentialid;
        $role->fkUserId = $r->UserId;
        $role->save();

        Session::flash('message', 'Role added successfully!!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('credential');



    }

    public function edit_credential(Request $r)

    {

        $platforms = Platform::get();

        $credential = Credential::find($r->Credentialid);
//        DD($r->Credentialid);
//        return $credential;

        return view('credential.credential_update', compact('credential', 'platforms'));
    }

    public function update_credential(Request $r)
    {

//        $rules = [
//            'PlatformName' => 'required|regex:/^[a-zA-Z]+$/u|max:255|',
//
//        ];
//        $this->validate($r, $rules);


        $credential = Credential::find($r->Credentialid);
//        $credential->PlatformName = $r->PlatformName;
        $credential->Email = $r->Email;
        $credential->Username = $r->Username;
        $credential->Password = $r->Password;
        $credential->RecoveryPhone = $r->RecoveryPhone;
        $credential->WhoElseHasAccess = $r->WhoElseHasAccess;
        $credential->WebsiteUrl = $r->WebsiteUrl;
        Session::flash('message', 'Credential Updated!');
        return back();
    }


    public function showcredential()
    {
        $credentialinfo = Credential::select(DB::raw("(`platform`.`PlatformName`) as platformname"), 'Credentialid', 'fkPlatformid', 'credential.Email', 'credential.Username', 'credential.Password', 'credential.RecoveryPhone', 'credential.WhoElseHasAccess', 'credential.WebsiteUrl')
            ->leftjoin('platform', 'fkPlatformid', 'PlatformId')->get();
        $datatables = DataTables::of($credentialinfo);
        return $datatables->make(true);


    }


    public function deletecredential(Request $r)
    {
        $credential = Credential::findorFail($r->Credentialid);
        $credential->delete();

    }

}
