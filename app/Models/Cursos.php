<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    //Definimos la tabla y su primary key, puesto que la base de datos esta definida en el .env
    protected $table = 'curso';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    //Declaramos que el curso tiene muchos usuarios
    public function usuarios()
    {
        return $this->hasMany('App\Models\Usuari', 'username');
    }
}
