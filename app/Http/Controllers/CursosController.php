<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;
use App\Clases\Utilitats;
use App\Models\Usuari;
use Illuminate\Database\QueryException;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Si la request es de search implementaremos este codigo
        if ($request->has('search')) {
            $search = $request->input('search');
            $curs = Cursos::where('nombre', 'like', '%' . $search . '%')
                ->orderby('nombre')
                ->paginate(5);
        } else {
            //En caso de hacer una busqueda vacia
            $search = '';
            $curs = Cursos::orderby('nom')->paginate(5);
        }

        $data['curs'] = $curs;
        $data['search'] = $search;
        return view('curs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Capturamos todos los usuarios y los mandamos al create de cursos
        $usuaris = Usuari::all();
        $data['usuaris'] = $usuaris;

        return view('curs.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = new Cursos();
        $curso->codigo = $request->input('codigo');
        $curso->nombre = $request->input('nombre');
        $curso->descripcion = $request->input('descripcion');
        $curso->usuario_username = $request->input('usuario_username');

        try {
            $curso->save();
        } catch (QueryException $e) {
            $error = Utilitats::errorMessage($e);
            $request->session()->flash('error', $error);
            //En caso de error al guardar iremos al formulario de inserción con los datos introducidos
            return redirect()->action('CursosController@create')->withImput();
        }

        return redirect()->action('CursosController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function show(Cursos $cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function edit(Cursos $curso)
    {        //Capturamos el curso y los usuarios y lo redirigimos al edit

        $usuaris = Usuari::all();

        $data['usuaris'] = $usuaris;
        $data['curso'] = $curso;
        return view('curs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cursos $curso)
    {
        $curso->codigo = $request->input('codigo');
        $curso->nombre = $request->input('nombre');
        $curso->descripcion = $request->input('descripcion');
        $curso->usuario_username = $request->input('usuario_username');

        try {
            $curso->save();
        } catch (QueryException $e) {
            $error = Utilitats::errorMessage($e);
            $request->session()->flash('error', $error);
            //En caso de error al guardar iremos al formulario de inserción con los datos introducidos
            return redirect()->action('CursosController@edit')->withImput();
        }

        return redirect()->action('CursosController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cursos $curso)
    {
        $curso->delete();
        return redirect()->action('CursosController@index');
    }
}
