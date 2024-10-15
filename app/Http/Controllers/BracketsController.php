<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BracketsController extends Controller
{
    public function bracket(){

        return view('dash.Brackets.index');
    }
}
