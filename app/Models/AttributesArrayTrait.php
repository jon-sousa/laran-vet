<?php

namespace App\Models;

Trait AttributesArrayTrait
{
    public function setFromArray(array $dados){
    foreach($dados as $chave => $dado){
           $method = 'set' . $chave;
           
            if(method_exists($this, $method)){
              $this->$method($dado);
              $this->attributes[$chave] = $dado;
            }
       }
    }
}