@extends('Layouts.LayoutFull')

@push('css')

@endpush
@if (Session::has('success'))
        toastr["success"]("<b>Sucesso: </b><br>
        {{ Session::get('success')}}");
    
@endif
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
                        <td class="cpf-mask">{{$client->cpf}}</td>
                        <td>{{$client->name}}</td>
                        <td>{{$client->email}}</td>
                        <td>
                            {{-- <button type="button" class="btn btn-primary btn-sm far fa-edit"> Editar</button> --}}
                            <a href="{{ route('clients.edit', [ $client->id])}}"
                            class="btn btn-primary btn-sm text-white">
                                <i class="fal fa-pencil"></i>
                                <span class="d-none d-md-inline">Editar</span>
                            </a>
                            {{-- Utilizar o ajax para fazer o botão de delete do cliente --}}
                            <span data-url="{{ route('clients.destroy',[$client->id])}}" data-idClient='{{ $client->id}}'
                                class="btn btn-danger btn-sm text-white deleteButton">
                                    <i class="fal fa-trash-alt"></i>
                                    <span class="d-none d-md-inline">Apagar</span>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </table>
    <div class="button">
        <a href="client/create" type="submit" class="btn btn-success fas fa-plus"> Adicionar</a>
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

        // Codigo ajax pra fazer o botão de deletar
        $('.deleteButton').on('click', function (e) {
            var url = $(this).data('url');
            var idClient = $(this).data('idClient');
            $.ajaxSetup({ // Configuração do ajax
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}, //criar um token de validação
                method: 'DELETE', // se não passar o method delete ele entende como method = show
                url: url // pra onde vai direcionar
            });
            $.ajax({
                data: { // informação que ta passando pro ajax
                    'idClient': idClient,
                },
                success: function (data) {
                    console.log(data);
                    if (data['status'] ?? '' == 'success') {
                        // isso é gambiarra, o ajax é utilizado para não dar reload da página
                        if (data['reload'] ?? '') {
                            location.reload();
                        }
                    } else {
                    console.log('error');
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

    </script>
@endpush
