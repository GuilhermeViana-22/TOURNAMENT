<?php

namespace App\Http\Controllers;

class TeamController extends Controller
{
    

    public function index(){

    }

    public function inscricao(){
        return view('dash.inscricao.inscricao'); // O caminho deve ser relativo à pasta 'views'
    }
}
