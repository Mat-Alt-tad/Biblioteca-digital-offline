<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $table = '_libros';
    protected $fillable = ['titulo', 'autor', 'descripcion', 'imagen_url', 'pdf_url', 'Materia'];
}
