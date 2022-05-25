<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'cliente_id', 'producto_id', 'repartidor_id', 'hora_entrega', 'descripcion'];
}
