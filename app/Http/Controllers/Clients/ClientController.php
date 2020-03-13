<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\CLientStoreRequest;

class ClientController extends Controller
{
    public function index(){
        $clientModel = app(Client::class);
        $clients = $clientModel->all(); // pesquisa todas a linhas da tabela
        //$clients = $clientModel->find(1); // pesquisa pelo id

        //$clients = $clientModel->where('cpf','1234567890')->get(); //pesquisar pelo campo espeficicado, ->get() para pegar o que o método where retornou

        return view('Clients/index',compact('clients')); // parametros: view, o que eu quero retornar pra view
    }

    public function create(){
        return view('Clients/create');
    }

    public function store(CLientStoreRequest $request){ // fazer a validação primeiro
        //dd($request['cpf']);
        $data = $request->all();
        $clientModel = app(Client::class);
        $data = $clientModel->create([
            'name'=> $data['name'],
            'cpf' => preg_replace("/[^A-Za-z0-9]/", "",$data['cpf']),
            'email' => $data['email'],
            'endereco' => $data['endereco'] ?? null,
            'active_flag'=> isset($data['active_flag']) ? true : false,
        ]);
        return redirect()->route('clients.index');
    }
}
