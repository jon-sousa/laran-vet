<?php

namespace App\Models;

use App\Models\Animal;
use App\Models\Cliente;
use App\Models\Veterinario;
use App\Models\AttributesArrayTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consulta extends Model
{
    use HasFactory;
    use AttributesArrayTrait;

    protected string $relato;
    protected float $taxa;
    protected bool $concluido = false;
    protected bool $pago = false;  
    protected $attributes = [];  

    public function __construct(){}

    public function animal(){
        return $this->belongsTo(Animal::class);
    }

    public function veterinario(){
        return $this->belongsTo(Veterinario::class);
    }

    /**
     * Get the value of relato
     */ 
    public function getRelato()
    {
        return $this->relato;
    }

    /**
     * Set the value of relato
     *
     * @return  self
     */ 
    public function setRelato($relato)
    {
        $this->relato = $relato;

        return $this;
    }

    /**
     * Get the value of taxa
     */ 
    public function getTaxa()
    {
        return $this->taxa;
    }

    /**
     * Set the value of taxa
     *
     * @return  self
     */ 
    public function setTaxa($taxa)
    {
        $this->taxa = $taxa;

        return $this;
    }

    /**
     * Get the value of concluido
     */ 
    public function getConcluido()
    {
        return $this->concluido;
    }

    /**
     * Set the value of concluido
     *
     * @return  self
     */ 
    public function setConcluido($concluido)
    {
        $this->concluido = $concluido;

        return $this;
    }

    /**
     * Get the value of pago
     */ 
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * Set the value of pago
     *
     * @return  self
     */ 
    public function setPago($pago)
    {
        $this->pago = $pago;

        return $this;
    }
}
