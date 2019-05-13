<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <br />
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    @if (count($clients) > 0)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th colspan="2">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td><img src="images/{{ $client['image'] }}" height="80px" width="80px" /></td>
                <td>{{$client['name']}}</td>
                <td>{{$client['email']}}</td>
                <td>{{$client['phone']}}</td>
                <td><a href="{{action('ClientController@edit', $client['id'])}}" class="btn btn-warning">Editar</a></td>
                <td>
                    <form action="{{action('ClientController@destroy', $client['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Deseja excluir esse cliente ?')" >Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>Não há clientes cadastrados na base de dados.</p>
    @endif
    <div class="row">
        <form action="{{action('ClientController@create')}}" method="get">
        <div class="form-group col-md-4">
            <a href="{{action('ClientController@create')}}" class="btn btn-success">Cadastrar novo cliente</a>
        </div>
        </form>
    </div>
</div>
</body>
</html>