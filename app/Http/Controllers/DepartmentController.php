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

        $rules = [
            'DepartmentName' => 'required|regex:/^[a-zA-Z]+$/u|max:255|',

        ];
        $this->validate($r, $rules);

        $department = new Department();
        $department->DepartmentName = $r->DepartmentName;
        $department->save();

        Session::flash('message','Department added successfully!!');
        Session::flash('alert-class','alert-success');
        return redirect()->route('department');

    }

    public function edit_department(Request $r){

        $department = Department::find($r->DepartmentId);

        return view('department.department_update')->with('department', $department);
    }

    public function update_department(Request $r){

        $rules = [
            'DepartmentName' => 'required|regex:/^[a-zA-Z]+$/u|max:255|',

        ];
        $this->validate($r, $rules);


        $department = Department::find($r->DepartmentId);
        $department->DepartmentName = $r->DepartmentName;
        $department->save();
        Session::flash('message', 'Department Updated!');
        return back();
    }
//


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
