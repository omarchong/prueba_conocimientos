<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'tipocliente',
        'nombreempresa',
        'estado_id',
        'cp',
        'referencias',
        'direccionfiscal',
        'estatuscliente',
        'rfc',
        'contacto_id',
        'giro_id'
    ];

    public function giro()
    {
        return $this->belongsTo(Giro::class);
    }

    public function estados()
    {
        return $this->belongsTo(Estado::class);
    }
    public function contacto()
    {
        return $this->belongsTo(Contacto::class);
    }
}
