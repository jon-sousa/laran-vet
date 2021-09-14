<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\VacinaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConsultaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('animais/cadastrar', [AnimalController::class, 'cadastrar']);
Route::middleware('auth:sanctum')->put('animais/alterar', [AnimalController::class, 'alterar']);
Route::middleware('auth:sanctum')->delete('animais/deletar/{id}', [AnimalController::class, 'deletar']);
Route::middleware('auth:sanctum')->get('animais/buscar', [AnimalController::class, 'buscarTodos']);
Route::middleware('auth:sanctum')->get('animais/buscar/{id}', [AnimalController::class, 'buscarUm']);

Route::post('cliente/cadastrar', [ClienteController::class, 'cadastrar']);
Route::post('cliente/login', [ClienteController::class, 'login']);
Route::middleware('auth:sanctum')->get('cliente/logout', [ClienteController::class, 'logout']);
Route::middleware('auth:sanctum')->get('cliente/animais', [AnimalController::class, 'buscarPorCliente']);
Route::middleware('auth:sanctum')->get('cliente/animal/{animalId}', [AnimalController::class, 'buscarUmPorCliente']);

Route::middleware('auth:sanctum')->post('consulta/salvar', [ConsultaController::class, 'salvar']);
Route::middleware('auth:sanctum')->put('consulta/atualizar', [ConsultaController::class, 'atualizar']);
Route::middleware('auth:sanctum')->get('consulta/todas-por-cliente', [ConsultaController::class, 'consultasPorCliente']);

Route::middleware('auth:sanctum')->post('vacina/agendar', [VacinaController::class, 'agendar']);
Route::middleware('auth:sanctum')->get('vacina/todas-por-cliente', [VacinaController::class, 'vacinasPorCliente']);


