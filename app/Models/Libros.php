<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Autores;

class Libros extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'f_publicacion', 'id_autor'];

    public function autor()
    {
        return $this->belongsTo(Autores::class, 'id_autor');
    }
}
