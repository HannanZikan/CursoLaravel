@extends('Layouts.LayoutFull')

@push('css')

@endpush
@section('conteudo')
    <div style="text-align: center;">
        <h1>Cadastro de cliente</h1>
        <form action="">
            <label>Nome</label>
            <input type="text" placeholder="Insira seu nome..." />
            <br>
            <label>CPF</label>
            <input id="cpf" type="text" name="cpf" class="cpf-mask" placeholder="Insira seu cpf..." />
            
            <br>
            <label>Endereço</label>
            <input type="text" placeholder="Insira seu endereço..." />
            <br>
            <input type="submit" class="btn btn-primary"></a>
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
