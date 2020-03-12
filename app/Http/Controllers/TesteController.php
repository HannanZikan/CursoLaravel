<?php
/*HZ*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller  /*extends pra puxar tudo da controller*/
{
    public function index(){
        return view('Clients/index'); //retornando a view, o Laravel já vai buscar na pasta padrão resources>>view

    }
}
