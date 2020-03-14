<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;

class ClientController extends Controller
{
    public function index()
    {
        $clientModel = app(Client::class);
        $clients = $clientModel->all(); // pesquisa todas a linhas da tabela
        //$clients = $clientModel->find(1); // pesquisa pelo id

        //$clients = $clientModel->where('cpf','1234567890')->get(); //pesquisar pelo campo espeficicado, ->get() para pegar o que o método where retornou

        return view('Clients/index', compact('clients')); // parametros: view, o que eu quero retornar pra view
    }

    public function create()
    {
        return view('Clients/create');
    }

    public function store(ClientStoreRequest $request)
    { // fazer a validação primeiro
        //dd($request['cpf']);
        $data = $request->all();
        $clientModel = app(Client::class);
        $data = $clientModel->create([
            'name'=> $data['name'],
            'cpf' => preg_replace("/[^A-Za-z0-9]/", "", $data['cpf']),
            'email' => $data['email'],
            'endereco' => $data['endereco'] ?? null,
            'active_flag'=> isset($data['active_flag']) ? true : false,
        ]);
        return redirect()->route('clients.index');
    }

    public function destroy($id)
    {
        if (!empty($id)) {
            $clientModel = app(Client::class);
            $client = $clientModel->find($id);
            if (!empty($client)) {
                $client->delete();
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Cliente deletado com sucesso.',
                    'reload'  => true,
                ]);
            } else {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Cliente não encontrado.',
                    'reload'  => true,
                ]);
            }
        } else {
            return response()->json([
                'status'  => 'error',
                'message' => 'ID não está na requisição',
                'reload'  => true,
            ]);
        }
    }

    // para mandar as infoprmações do livro já preenchidas para o formulário de alteração
    public function edit($id)
    {
        $clientModel = app(Client::class);
        $client = $clientModel->find($id);
        return view('Clients/edit', compact('client')); // compact($variável)
        //dd($client);
    }

    public function update(ClientUpdateRequest $request, $id)
    {
        $data = $request->all();
        $clientModel = app(Client::class);
        $client = $clientModel->find($id);
        $client->update([
            'name'=> $data['name'],
            'cpf'=>preg_replace("/[^A-Za-z0-9]/", "", $data['cpf']) ,
            'email'=>$data['email'],
            'endereco'=>$data['endereco'] ?? null,
           'active_flag'=> (($data['activebox'] ?? ' ') == null),
        ]);
        return redirect()->route('clients.index');
    }
}
