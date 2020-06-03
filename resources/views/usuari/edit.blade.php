@extends('templates.main')

@section('titulo')
    Editar Usuario
@endsection

@section('principal')

    @include('partial.errores')

    <div class="card mt-2 border-dark">
        <div class="card-header bg-dark text-light">
            Usuario
        </div>
        <div class="card-body">
            <form action="{{action('UsuariController@update', $usuari)}}" method="POST">
                @method('put')
                @csrf

                <div class="form-group row">
                  <label for="nom" class="col-sm-2 col-form-label">Nombre</label>
                  <div>
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="Nombre del Usuario" aria-describedby="helpId" value="{{$usuari->nom}}">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="username" class="col-sm-2 col-form-label">Nombre de Usuario</label>
                  <div>
                    <input type="text" name="username" id="edad" class="form-control" placeholder="Edad del actor" aria-describedby="helpId" value="{{$usuari->username}}">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="pasword" class="col-sm-2 col-form-label">Password</label>
                  <div>
                    <input type="text" name="pasword" id="pasword" class="form-control" placeholder="Password" aria-describedby="helpId" value="{{$usuari->pasword}}">
                  </div>
                </div>


              
                <div class="form-group row">
                  <div class="col-sm-10 offset-2">
                    <button type="submit" class="btn btn-primary">Acceptar</button>
                  <a name="" id="" class="btn btn-secondary" href="{{ url('/usuaris')}}" role="button">Cancelar</a>
                  </div>
                </div>
            </form>
        </div>
    </div>
@endsection
