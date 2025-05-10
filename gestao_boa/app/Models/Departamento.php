<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
    protected $fillable = [
        'nome',
        'funcao',
    ];
 public function funcionario(){
    return $this->hasMany(
        Funcionario::class, //Qual o modelo referenciado
        'departamento_id' , // Como está a chave estrangeira no modelo
        'id' // Qual a Chave Primária
        );
       }
}
