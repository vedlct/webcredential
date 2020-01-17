<?php

namespace App\Http\Controllers;

use App\Credential;
use App\Department;
use App\Platform;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Session;
use function foo\func;


class CredentialController extends Controller
{


    public function index()
    {
        $users = User::all();
        $departments = Department::select('DepartmentName', 'DepartmentId')->get();
        $platforms = Platform::all();
        $credential = Credential::all();
        return view('credential.credential', compact('platforms', 'departments', 'users', 'credential'));
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

    public function getusers($UserId)
    {
        $users = User::where('fkDepartmentId', $UserId)->pluck('name', 'UserId');

        return json_encode($users);
    }

    public function save(Request $r)
    {


        foreach($r->UserId as $UserId) {


            $role = new Role();
            $role->fkCredentialid = $r->ccid;
            $role->fkUserId = $UserId;
            $role->save();
        }


        return back();


    }


    public function edit_credential(Request $r)

    {

        $platforms = Platform::get();

        $credential = Credential::find($r->Credentialid);


        return view('credential.credential_update', compact('credential', 'platforms'));
    }

    public function update_credential(Request $r)
    {


        $credential = Credential::find($r->Credentialid);
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
//        $datatables = DataTables::of($credentialinfo)
//            ->addColumn('checkbox', function () {
//                return '<input type="checkbox" name="sample" value="">';
//
//            });
//        return $datatables
//            ->rawColumns(['checkbox'])
//            ->make(true);
    }


    public function deletecredential(Request $r)
    {
        $credential = Credential::findorFail($r->Credentialid);
        $credential->delete();

    }

}
