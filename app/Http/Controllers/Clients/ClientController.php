<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(){
        $clientModel = app(Client::class);
        $clients = $clientModel->all(); // pesquisa todas a linhas da tabela
        //$clients = $clientModel->find(1); // pesquisa pelo id
        //$clients = $clientModel->where('cpf','1234567890')->get(); //pesquisar pelo campo espeficicado, ->get() para pegar o que o método where retornou


        //dd($clients);

        return view('Clients/index',compact('clients')); // parametros: view, o que eu quero retornar pra view
    }

    public function create(){
        /*
        $clientModel = app(Client::class); //instanciar a classe Client dentro da variavel
        $client = $clientModel->create([
            'name'=>'name test2',
            'cpf'=>98765432199,
            'email'=>'teste@gmail.com',
            'active_flag'=>false
        ]);
        */
        //return $client;
        return view('Clients/create');
    }

    public function store(){
        $clientModel = app(Client::class); //instanciar a classe Client dentro da variavel
        $client = $clientModel->create([
            'name'=>'name test2',
            'cpf'=>98765432199,
            'email'=>'teste@gmail.com',
            'active_flag'=>false
        ]);

        return view('Clients/index');
    }
}
