@extends('Layouts.LayoutFull')

@push('css')

@endpush

@section('conteudo')
<style>
    div.button{
        display: flex;
        justify-content: flex-end;
    }
</style>
<body>
    <table>
        <table class="table table-hover table-light">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">CPF</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <th scope="row">{{$client->id}}</th>
                        <td>{{$client->cpf}}</td>
                        <td>{{$client->name}}</td>
                        <td>{{$client->email}}</td>
                    </tr>
                @endforeach
            </tbody>
    </table>
    <div class="button">
        <a href="client/create" type="submit" class="btn btn-success">Adicionar</a>
    </div>
</body>
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
