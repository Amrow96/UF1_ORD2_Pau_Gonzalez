<?php

namespace App\Http\Controllers;

use App\Models\Usuari;
use Illuminate\Http\Request;
use App\Clases\Utilitats;

use Illuminate\Database\QueryException;


class UsuariController extends Controller
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
            $usuari = Usuari::where('nom', 'like', '%' . $search . '%')
                ->orderby('nom')
                ->paginate(5);
        } else {
            //En caso de hacer una busqueda vacia
            $search = '';
            $usuari = Usuari::orderby('nom')->paginate(5);
        }

        $data['usuari'] = $usuari;
        $data['search'] = $search;
        return view('usuari.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Capturamos todos los usuarios y los enviamos a la nueva vista
        $usuario = Usuari::all();
        $data['usuaris'] = $usuario;

        return view('usuari.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuari = new Usuari();
        $usuari->nom = $request->input('nom');
        $usuari->password = $request->input('password');
        $usuari->username = $request->input('username');

        try {
            $usuari->save();
        } catch (QueryException $e) {
            $error = Utilitats::errorMessage($e);
            $request->session()->flash('error', $error);
            //En caso de error al guardar iremos al formulario de inserción con los datos introducidos
            return redirect()->action('UsuariController@create')->withImput();
        }
        //Volveremos al index
        return redirect()->action('UsuariController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function show(Usuari $usuari)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuari $usuari)
    {
        //Capturamos el usuario y lo redirigimos al edit
        $data['usuari'] = $usuari;

        return view('usuari.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuari $usuari)
    {
        $usuari->nom = $request->input('nom');
        $usuari->password = $request->input('password');
        $usuari->username = $request->input('username');

        try {
            $usuari->save();
        } catch (QueryException $e) {
            $error = Utilitats::errorMessage($e);
            $request->session()->flash('error', $error);
            //En caso de error al guardar iremos al formulario de modificación con los datos introducidos
            return redirect()->action('UsuariController@edit')->withImput();
        }
        //Volveremos al index
        return redirect()->action('UsuariController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuari $usuari)
    {
        //Eliminamos el usuario que nos envian
        $usuari->delete();
        return redirect()->action('UsuariController@index');
    }
}
