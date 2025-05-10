<?php

use App\Models\Departamento;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/criar_funcionario' , function (Request $request) {
    $funcionario = new Funcionario();
    $funcionario->nome = $request->input('nome');;
    $funcionario->idade = $request->input('idade');;
    $funcionario->salario = $request->input('salario' );;
    $funcionario->save();
    return response()->json($funcionario);
   });

Route::get('/funcionarios' , function () {
 $funcionario = Funcionario::all();
 return response()->json($funcionario);
});

Route::get('/funcionario/{id}' , function ($id) {
 $funcionario = Funcionario::find($id);
 return response()->json($funcionario);
});

Route::patch('/atualizar_funcionario/{id}', function (Request $request, $id) {
 $funcionario = Funcionario::find($id);
 if($request->input('nome') !== null){
 $funcionario->nome = $request->input('nome');
}
 if($request->input('idade') !== null){
 $funcionario->idade = $request->input('idade');
}
 if($request->input('salario') !== null){
 $funcionario->salario = $request->input('salario');
}
 if($request->input('departamento_id') !== null){
 $funcionario->departamento_id = $request->input('departamento_id');
}
 $funcionario->save();
 return response()->json($funcionario);
});

Route::delete('/deletar_funcionario/{id}' , function ($id) {
 $funcionario = Funcionario::find($id);
 $funcionario->delete();
 return response()->json($funcionario);
});

Route::post('/criar_departamento' , function (Request $request) {
 $departamento = new Departamento();
 $departamento->nome = $request->input('nome');;
 $departamento->funcao = $request->input('funcao');;
 $departamento->save();
 return response()->json($departamento);
});

Route::get('/departamentos' , function () {
 $departamento = Departamento::all();
 return response()->json($departamento);
});

Route::get('/departamento/{id}' , function ($id) {
 $departamento = Departamento::find($id);
 return response()->json($departamento);
});

Route::patch('/atualizar_departamento/{id}', function (Request $request, $id) {
 $departamento = Departamento::find($id);
 if($request->input('nome') !== null){
 $departamento->nome = $request->input('nome');
}
 if($request->input('funcao') !== null){
 $departamento->funcao = $request->input('funcao');
}
 $departamento->save();
 return response()->json($departamento);
});

Route::delete('/deletar_departamento/{id}' , function ($id) {
 $departamento = Departamento::find($id);
 $departamento->delete();
 return response()->json($departamento);
});

Route::post('/funcionario_departamento' , function (Request $request) {
    $funcionario = new Funcionario();
    $funcionario->nome = $request->input('nome');
    $funcionario->idade = $request->input('idade');
    $funcionario->salario = $request->input('salario' );
    $funcionario->departamento_id = $request->input('departamento_id' );
    $funcionario->save();
    return response()->json($funcionario);
   });