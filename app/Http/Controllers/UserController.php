<?php

namespace App\Http\Controllers;

use App\User;
use App\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Department;
use App\Usertype;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Session;


class UserController extends Controller
{


    public function index(){
        $usertype = UserType::get();
        $department = Department::get();
        return view('user.userlist', compact('usertype', 'department'));
    }

    public function insert(Request $r){


        $user = new User();
        $user->name = $r->name;
        $user->email = $r->email;
        $user->fkDepartmentId = $r->departmentId;
        $user->fkUserTypeId = $r->usertype;
        if ($r->password) {
            $user->password = Hash::make($r->password);
        }else{
            $user->password = Hash::make('123456');

        }
        $user->created_at = Carbon::now();
        Session::flash('message','User added successfully!!');
        Session::flash('alert-class','alert-success');
        $user->save();
       // toastr()->success('User Added Successfully');
        return back();

    }

    public function getuserdata(){

        $userlist = User::select('name', 'email','DepartmentName','UserType','updated_at','UserId')
            ->leftjoin('usertype','UserTypeId','fkUserTypeId')
            ->leftjoin('department','DepartmentId','fkDepartmentId')->get();


        $datatables = DataTables::of($userlist);
        return $datatables->make(true);
    }

    public function edit(Request $r){

        $user = User::where('UserId', $r->id)
            ->first();
        $usertype = UserType::get();
        $department = Department::get();
        return view('user.edit', compact('user', 'usertype', 'department'));
    }
    public function update(Request $r, $id){

        $user = User::findOrFail($id);
        $user->name = $r->name;
        $user->email = $r->email;
        $user->fkDepartmentId = $r->departmentId;
        $user->fkUserTypeId = $r->usertype;
        if ($r->password) {
            $user->password = Hash::make($r->password);
        }else{
            $user->password = Hash::make('123456');

        }
        $user->created_at = Carbon::now();

        $user->save();
        // toastr()->success('User Added Successfully');
        return back();
    }



}
