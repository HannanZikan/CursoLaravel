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
        <h1>Cadastro de Livro</h1>
    <form action="{{route('books.store')}}" method='POST'>
            {{ csrf_field() }} <!-- token do form request-->
            <label>Nome</label>
            <input id="name" name="name" class="form-control" type="text" value="{{old("name")}}" placeholder="Insira o nome do livro..."  />
            <br>
            <label>Autor</label>
            <input id="writer" name="writer" type="text" class="form-control" value="{{old("writer")}}" placeholder="Insira o nome do autor..." />
            
            <br>
            <label>Nº Páginas</label>
            <input id="page_number" name="page_number" class="form-control" type="number" value="{{old("page_number")}}" placeholder="Insira o número de páginas..." />
            <br>
            <div class="button">
                {{-- <a href="./" class="btn btn-sm btn-primary far fa-hand-point-left"> Voltar</a> --}}
                <button type="submit" class="btn btn-sm btn-success far fa-thumbs-up"> Cadastrar</button>
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
