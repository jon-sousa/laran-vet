<?php

namespace App\Models;

use App\Models\Vacina;
use App\Models\Cliente;
use App\Models\Consulta;
use App\Models\AttributesArrayTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animal extends Model
{
    use HasFactory;
    use AttributesArrayTrait;

    protected int $id;
    protected string $nome;
    protected string $tipo;
    protected string $raca;
    protected $attributes = [];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    
    public function consultas(){
        return $this->hasMany(Consulta::class);
    }

    public function vacinas(){
        return $this->hasMany(Vacina::class);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of raca
     */ 
    public function getRaca()
    {
        return $this->raca;
    }

    /**
     * Set the value of raca
     *
     * @return  self
     */ 
    public function setRaca($raca)
    {
        $this->raca = $raca;

        return $this;
    }
}
