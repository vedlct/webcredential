<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('department');
    }

    public function insert(Request $r){

        $department = new Department();
        $department->DepartmentName = $r->DepartmentName;
        $department->save();

        Session::flash('message','Department added successfully!!');
        Session::flash('alert-class','alert-success');
        return redirect()->route('department');

    }

    public function showDepartment(){
        $departmentInfo = Department::all();
        $datatables = DataTables::of($departmentInfo);
        return $datatables->make(true);

    }
}
