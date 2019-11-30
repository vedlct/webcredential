<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Session;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('department.department');
    }

    public function add()
    {
        $department = Department::paginate(12);
        return view('department.add');
    }
//
    public function insert(Request $r){

        $department = new Department();
        $department->DepartmentName = $r->DepartmentName;
        $department->save();

        Session::flash('message','Department added successfully!!');
        Session::flash('alert-class','alert-success');
        return redirect()->route('department');

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

    public function showDepartment(){
        $departmentInfo = Department::all();
        $datatables = DataTables::of($departmentInfo);
        return $datatables->make(true);


    }

    public function deletedepartment(Request $r)
    {
        $department = Department::findorFail($r->DepartmentId);
        $department->delete();

    }
}
