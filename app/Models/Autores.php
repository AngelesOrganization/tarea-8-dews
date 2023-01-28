<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autores extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellidos', 'nacionalidad'];

    public function libros()
    {
        return $this->hasMany(Libros::class, 'id_autor');
    }
}
