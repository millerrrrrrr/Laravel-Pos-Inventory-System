<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosController extends Controller
{
    public function posIndex(){
        return view('pos.index');
    }
}
