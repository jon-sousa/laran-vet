<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Vacina;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VacinaController extends Controller
{
    public function agendar(Request $request){
        $dados = $request->input();
        $animal = Animal::find($dados['animal_id']);

        if(!$animal){
            return response()->json(['erro'=>'animal nao encontrado', 'animal_id' => $dados['animal_id']], 404);
        }

        $vacina = new Vacina();
        $vacina->setFromArray($dados);

        $animal->vacinas()->save($vacina);

        return response()->json(['response' => 'vacina agendada com sucesso'], 201);
    }

    public function vacinasPorCliente(Request $request){
        $clienteId = $request->session()->get('id');

        if(!$clienteId){
            return response()->json(['erro' => 'dados não validados'], 403);
        }

        $cliente = Cliente::find($clienteId);
        if(!$cliente){
            return response()->json(['erro' => 'dados não validados'], 403);
        }

        $pets = $cliente->animais;
        $pets->load('vacinas');
        
        return response()->json(['response' => $pets], 200); 
    }
}
