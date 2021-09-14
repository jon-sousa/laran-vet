<?php

namespace App\Models;

use App\Models\Animal;
use App\Models\Veterinario;
use App\Models\AttributesArrayTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacina extends Model
{
    // use HasFactory;
    use AttributesArrayTrait;

    protected int $id;
    protected string $doenca;
    protected string $data;
    protected $attributes = [];

    public function animal(){
        return $this->belongsTo(Animal::class);
    }

    public function veterinario(){
        return $this->belongsTo(Veterinario::class);
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
     * Get the value of doenca
     */ 
    public function getDoenca()
    {
        return $this->doenca;
    }

    /**
     * Set the value of doenca
     *
     * @return  self
     */ 
    public function setDoenca($doenca)
    {
        $this->doenca = $doenca;

        return $this;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}
