<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $primaryKey = 'cedula';
    protected $fillable = ['cedula, nombre, direccion, telefono'];
    protected $guarded=[];
    public $timestamps = false;

}
