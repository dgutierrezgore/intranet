<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CentralDocumentacion extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home(){

        return view('back_end.centdoc.home');

    }

}
