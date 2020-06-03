@extends('templates.main')

@section('titulo')
    Usuario
@endsection

@section('principal')

<div class="card mt-2">
    <div class=" card-body">
    <a href="{{ action('UsuariController@create')}}" class="btn btn-secondary">Nuevo Usuario</a>
    </div>
</div>

<div class="card mt-2">
    <div class="card-header bg-dark text-white">
        Lista Usuarios
    </div>
    <div class="card-body">

        <form action=" {{ action('UsuariController@index') }} " method="GET" class="form-horizontal">
            <div class="form-group row">
                <label for="" class="col-1">Nombre </label>
                <div class="col-10">
                <input type="text" class="form-control" name="search" id="search" value='{{$search}}'>
                </div>
                <button type="submit" class="btn btn-secondary btn-sm col-1">Buscar</button>
            </div>
        </form>


        <table class="table">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuari as $usuario)
                    <tr>
                        <td> {{ $usuario->username }} </td>
                        <td> {{ $usuario->nom }} </td>
                        <td> {{  $usuario->pasword }}</td>
                        <td>
                            <form action=" {{action('UsuariController@edit', $usuario) }}" method="GET">
                                <button type="submit" class="btn btn-primary btn-sm">Editar</button>
                            </form>
                        </td>
                        <td>
                            <form action=" {{action('UsuariController@destroy',  $usuario) }}" method="POST">
                               @method('delete')
                               @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $usuari->appends(['search'=>$search])->links() }}
    </div>
</div>
@endsection
