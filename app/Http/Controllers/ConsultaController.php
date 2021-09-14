<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Cliente;
use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function salvar(Request $request){
        $dados = $request->input();

        $clienteId = $request->session()->get('id');
        $animalId = $dados['animal_id'];

        $pet = $this->buscaAnimal($clienteId, $animalId);

        if(!$pet){
            return response()->json(['erro' => 'pet nao encontrado'], 404);
        }

        $consulta = new Consulta();
        $consulta->setFromArray($dados);

        $pet->consultas()->save($consulta);

        return response()->json(['response' => 'consulta incluida com sucesso'], 201);
    }
    
    public function atualizar(Request $request){
        $dados = $request->input();

        $clienteId = $request->session()->get('id');
        $animalId = $dados['animal_id'];

        $pet = $this->buscaAnimal($clienteId, $animalId);
    
        if(!$pet){
            return response()->json(['erro' => 'pet nao encontrado'], 404);
        }
    
        $consulta = $pet->consultas->where('id', $dados['id'])->first();
        $consulta->setFromArray($dados);
    
        $pet->consultas()->save($consulta);
    
        return response()->json(['response' => 'consulta atualizada com sucesso', 'consulta'=>$consulta, 'dados'=>$dados], 201);

    }

    public function consultasPorCliente(Request $request){
        $clienteId = $request->session()->get('id');

        if(!$clienteId){
            return response()->json(['erro' => 'dados não validados'], 403);
        }

        $cliente = Cliente::find($clienteId);
        if(!$cliente){
            return response()->json(['erro' => 'dados não validados'], 403);
        }

        $pets = $cliente->animais;
        $pets->load('consultas');
        
        return response()->json(['response' => $pets], 200); 
    }

    private function buscaAnimal($clienteId, $animalId){
        if(!$clienteId){
            return null;
        }
        
        $cliente = Cliente::find($clienteId);
        if(!$cliente){
            return null;
        }

        return ($pet = $cliente->animais()->find($animalId));
    }
}
