@extends('templates.main')

@section('titulo')
    Cursos
@endsection

@section('principal')

<div class="card mt-2">
    <div class=" card-body">
    <a href="{{ action('CursosController@create')}}" class="btn btn-secondary">Nuevo Curso</a>
    </div>
</div>

<div class="card mt-2">
    <div class="card-header bg-dark text-white">
        Lista Cursos
    </div>
    <div class="card-body">

        <form action=" {{ action('CursosController@index') }} " method="GET" class="form-horizontal">
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
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($curs as $curso)
                    <tr>
                        <td> {{ $curso->codigo }} </td>
                        <td> {{ $curso->nombre }} </td>
                        <td> {{ $curso->descripcion }} </td>
                        <td> {{ $curso->usuario_username }} </td>
                        <td>
                            <form action=" {{action('CursosController@edit', $curso) }}" method="GET">
                                <button type="submit" class="btn btn-primary btn-sm">Editar</button>
                            </form>
                        </td>
                        <td>
                            <form action=" {{action('CursosController@destroy', $curso) }}" method="POST">
                               @method('delete')
                               @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $curs->appends(['search'=>$search])->links() }}
    </div>
</div>
@endsection
