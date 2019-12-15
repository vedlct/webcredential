<?php

namespace App\Http\Controllers;

use App\Usertype;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Session;

class UsertypeController extends Controller
{
    public function index(){

        return view('usertype.usertype');
    }

    public function insert(Request $r){

        $rules = [
            'UserType' => 'required|regex:/^[a-zA-Z]+$/u|max:255|',

        ];
        $this->validate($r, $rules);

        $usertype = new Usertype();
        $usertype->UserType = $r->UserType;
        $usertype->save();

        Session::flash('message','Usertype added successfully!!');
        Session::flash('alert-class','alert-success');
        return redirect()->route('usertype');

    }

    public function edit_usertype(Request $r){

        $usertype = Usertype::find($r->UserTypeId);

        return view('usertype.usertype_update')->with('usertype', $usertype);
    }

    public function update_usertype(Request $r){

        $rules = [
            'UserType' => 'required|regex:/^[a-zA-Z]+$/u|max:255|',

        ];
        $this->validate($r, $rules);


        $usertype = Usertype::find($r->UserTypeId);
        $usertype->UserType = $r->UserType;
        $usertype->save();
        Session::flash('message', 'Usertype Updated!');
        return back();
    }


  public function showusertype(){
        $usertypeInfo = Usertype::all();
        $datatables = DataTables::of($usertypeInfo);
        return $datatables->make(true);
  }

    public function deleteusertype(Request $r)
    {
        $usertype = Usertype::findorFail($r->UserTypeId);
        $usertype->delete();

    }


}
