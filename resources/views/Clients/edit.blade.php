@extends('Layouts.LayoutFull')

@push('css')

@endpush

@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <style>
        div.form{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form{
            width: 500px;
        }
        form label{
            font-size: 20px;
        }
        div.button{
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
        }
    </style>
    <div class="form">
        <h1>Cadastro de cliente</h1>
    <form action="{{route('clients.update', [$client->id])}}" method='POST'>
            {{ csrf_field() }} <!-- token do form request-->
            @method('PUT')
            <label>Ativo: </label>
            <input id="active_flag" name="active_flag" type="checkbox" @if ($client->active_flag = true) checked='checked' @endif/>
            <br>
            <label>Nome</label>
            <input id="name" name="name" class="form-control" type="text" value="{{old("name", $client->name)}}" placeholder="Insira seu nome..."  />
            <br>
            <label>CPF</label>
            <input id="cpf" name="cpf" type="text" class="cpf-mask form-control" value="{{old("cpf", $client->cpf)}}" placeholder="Insira seu cpf..." />
            
            <br>
            <label>E-mail</label>
            <input id="email" name="email" class="form-control" type="text" value="{{old("email", $client->email)}}" placeholder="Insira seu endereço..." />
            <br>
            <label>Endereço</label>
            <input id="endereco" name="endereco" class="form-control" type="text" value="{{old("endereco", $client->endereco)}}" placeholder="Insira seu endereço..." />
            <br>
            <div class="button">
                <a href="{{route('clients.index')}}" class="btn btn-sm btn-primary far fa-hand-point-left"> Voltar</a>
                <button type="submit" class="btn btn-sm btn-success far fa-thumbs-up"> Editar</button>
            </div>
            
        </form>
    </div>
@endsection
@push('scripts')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script>
        $(".cpf-mask").mask('000.000.000-00')
    </script>
@endpush
