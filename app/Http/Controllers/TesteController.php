<?php
/*HZ*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller  /*extends pra puxar tudo da controller*/
{
    public function index(){
        //return view('Layouts/LayoutFull');
        $teste='texto';
        dd($teste);
    }
}
