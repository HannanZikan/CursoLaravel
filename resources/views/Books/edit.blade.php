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
        <h1>Edição de livros</h1>
    <form action="{{route('books.update', [$book->id])}}" method='POST'>
            {{ csrf_field() }} <!-- token do form request-->
            @method('PUT')
            <label>Nome</label>
            <input id="name" name="name" class="form-control" type="text" value="{{old("name", $book->name)}}" placeholder="Insira o nome do livro.."  />
            <br>
            <label>Autor</label>
            <input id="writer" name="writer" class="form-control" type="text" value="{{old("writer", $book->writer)}}" placeholder="Insira o nome do autor.."  />
            <br>
            <label>N° de Páginas</label>
            <input id="page_number" name="page_number" type="number" class="form-control" value="{{old("page_number", $book->page_number)}}" placeholder="Insira a número de páginas..." />
            <br>
            <div class="button">
                <a href="{{route('books.index')}}" class="btn btn-sm btn-primary far fa-hand-point-left"> Voltar</a>
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
@endpush
