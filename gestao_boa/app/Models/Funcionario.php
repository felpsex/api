<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    protected $fillable = [
        'nome',
        'idade',
        'salario',
        'departamento_id', 
    ];
    public function departamento (){
        return $this->belongsTo(
        Departamento::class, //Qual modelo referencia
        'departamento_id' , //Qual a Chave Estrangeira desse modelo no Modelo Product
        'id' // Qual o nome da Chave Primaria de Categoria
        );
       }
}
