<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;


class PageController extends Controller
{


    //
    public function index()
    {


        return view('homepage');
    }

}
