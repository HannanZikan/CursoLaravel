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
        $name_client = $_POST['name_client'];
        $cpf_client = $_POST['cpf_client'];
        $endereco_client = $_POST['endereco_client'];

        $clientModel = app(Client::class); //instanciar a classe Client dentro da variavel
        $client = $clientModel->create([
            'name'=> $name_client,
            'cpf'=> $cpf_client,
            'email'=>'teste@gmail.com',
            'endereco'=>$endereco_client
        ]);
        */
        
        return view('Clients/create');
    }

    public function store(){
        $name_client = $_POST['name_client'];
        $cpf_client = $_POST['cpf_client'];
        $endereco_client = $_POST['endereco_client'];

        $clientModel = app(Client::class); //instanciar a classe Client dentro da variavel
        $client = $clientModel->create([
            'name'=> $name_client,
            'cpf'=> $cpf_client,
            'email'=>'teste@gmail.com',
            'endereco'=>$endereco_client
        ]);
        
        
    }
}
