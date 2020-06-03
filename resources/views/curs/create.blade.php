@extends('templates.main')

@section('titulo')
Crear Curso
@endsection

@section('principal')

    @include('partial.errores')

    <div class="card mt-2 border-dark">
        <div class="card-header bg-dark text-light">
            Curso
        </div>
        <div class="card-body">
            <form action="{{action('CursosController@store')}}" method="POST">
                @csrf

                <div class="form-group row">
                  <label for="codigo" class="col-sm-2 col-form-label">Codigo</label>
                  <div>
                    <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Codigo del curso" aria-describedby="helpId" value="{{ old('codigo')}}">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                  <div>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del curso" aria-describedby="helpId" value="{{ old('nombre')}}">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                  <div>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion del curso" aria-describedby="helpId" value="{{ old('descripcion')}}">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="selUser" class="col-sm-2 col-form-label">Usuario</label>
                  <div class="col-sm-10">
                    <select name="usuario_username" id="selUser" class="custom-select">
                      @foreach ($usuaris as $usuari)
                        @if ($usuari->username == old('usuario_username'))
                          <option value="{{ $usuari->username}}" selected>{{ $usuari->nom}}</option>
                        @else
                          <option value="{{ $usuari->username}}">{{ $usuari->nom}}</option>
                        @endif

                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-10 offset-2">
                    <button type="submit" class="btn btn-primary">Acceptar</button>
                  <a name="" id="" class="btn btn-secondary" href="{{ url('/cursos')}}" role="button">Cancelar</a>
                  </div>
                </div>
            </form>
        </div>
    </div>
@endsection
