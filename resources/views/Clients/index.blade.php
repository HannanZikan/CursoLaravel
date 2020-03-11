@extends('Layouts.LayoutFull')

@push('css')

@endpush

@section('conteudo')
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
        <form action="">
            <label>Nome</label>
            <input class="form-control" type="text" placeholder="Insira seu nome..." />
            <br>
            <label>CPF</label>
            <input type="text" name="cpf" class="cpf-mask form-control" placeholder="Insira seu cpf..." />
            
            <br>
            <label>Endereço</label>
            <input class="form-control" type="text" placeholder="Insira seu endereço..." />
            <br>
            <div class="button">
                <button type="submit" class="btn btn-sm btn-primary">Cadastrar</button>
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
