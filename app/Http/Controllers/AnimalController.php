<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Cliente;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function cadastrar(Request $request){
        $dadosAnimal = $request->input();
        $id = $request->session()->get('id');
        $cliente = Cliente::find($id);
        $animal = new Animal();
        $animal->setFromArray($dadosAnimal);
        $cliente->animais()->save($animal);
        return response()->json($animal, 200);
    }

    public function alterar(Request $request){
        $dadosAnimal = $request->input();
        $animal = Animal::find($dadosAnimal['id']);

        if($animal == null){
            return response()->json(['erro' => 'animal não encontrado'], 404);
        }

        $animal->setFromArray($dadosAnimal);
        $animal->save();

        return response()->json($animal, 200);
    }

    public function deletar($id){
        $animal = Animal::find($id);

        if($animal == null){
            return response()->json(['erro' => 'animal não encontrado'], 404);
        }

        $animal->delete();

        return response()->json(['resposta' => 'animal deletado com sucesso'], 200);
    }

    public function buscarTodos(Request $request){
        $animais = Animal::All();
        $session = $request->session()->get('id');
        return response()->json($animais, 200);
    }

    public function buscarUm($id){
        $animal = Animal::find($id);

        if($animal == null){
            // return response()->json(['erro' => 'animal não encontrado'], 404);
        }

        return response()->json($animal, 200);
    }

    public function buscarPorCliente(Request $request){
        $id = $request->session()->get('id');
        $cliente = Cliente::find($id);
        
        if($cliente == null){
            return response()->json(['erro' => 'usuário não encontrado', 'id'=>$id], 404);
        }

        $animais = $cliente->animais;

        return response()->json($animais, 200);
    }

    public function buscarUmPorCliente(Request $request, $animalId){
        $id = $request->session()->get('id');
        $cliente = Cliente::find($id);
        
        if($cliente == null){
            return response()->json(['erro' => 'usuário não encontrado', 'id'=>$id], 404);
        }
        
        $animal = $cliente->animais()->find($animalId);
        $animal->consultas;
        $animal->vacinas;
        
        
        if($animal == null){
            return response()->json(['erro' => 'animal não encontrado', 'id'=>$id], 404);
        }

        return response()->json($animal, 200);
    }
}
