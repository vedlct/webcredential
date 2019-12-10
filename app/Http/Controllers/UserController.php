<?php

namespace App\Http\Controllers;

use App\User;
use App\Users;
use Illuminate\Http\Request;
use App\Department;
use App\Usertype;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;


class UserController extends Controller
{
    public function index()
    {
        return view('users.userlist');
    }

    public function insert(Request $r)
    {
        $user = new Users();
        $user->UserName = $r->UserName;
        $user->fkDepartmentId = $r->DepartmentId;
        $user->fkUserTypeId = $r->UserTypeId;
        $user->save();
        Session::flash('message', 'User Created!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('user');


    }

    public function showuserlist()
    {

        $showUserList = Users::select(DB::raw("(`department`.`DepartmentName`) as departmentname,(`usertype`.`UserType`) as usertype"), 'UserId', 'fkUserTypeId', 'fkDepartmentId', 'user.UserName')
            ->leftjoin('department', 'fkDepartmentId', 'DepartmentId')
            ->leftjoin('usertype', 'fkUserTypeId', 'UserTypeId')->get();
        $datatables = Datatables::of($showUserList);
        return $datatables->make(true);

    }

}
