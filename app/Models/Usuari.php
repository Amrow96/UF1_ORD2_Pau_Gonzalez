<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuari extends Model
{
    //Definimos la tabla y su primary key, puesto que la base de datos esta definida en el .env
    protected $table = 'usuario';
    protected $primaryKey = 'username';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
