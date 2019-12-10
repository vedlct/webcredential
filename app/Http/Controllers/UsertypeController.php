<?php

namespace App\Http\Controllers;

use App\Usertype;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UsertypeController extends Controller
{
    public function index(){

        return view('usertype.usertype');
    }


  public function showusertype(){
        $usertypeInfo = Usertype::all();
        $datatables = DataTables::of($usertypeInfo);
        return $datatables->make(true);
  }


}
