<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repartidor extends Model
{
    protected $table = 'repartidores';

    use HasFactory;
    protected $fillabe = ['nombre', 'app', 'apm', 'email', 'telefono', 'sexo'];
}
