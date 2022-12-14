<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    // use HasFactory;

    protected $table = 'articulo';
    protected $primaryKey = 'idarticulo';

    public $timestamps = false;

    protected $hidden = [
        'codigo',
        'nombre',
        'stock',
        'descripcion',
        'imagen',
        'estado'
    ];

    protected $guarded = [

    ];
}
