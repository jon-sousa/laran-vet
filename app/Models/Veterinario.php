<?php

namespace App\Models;

use App\Models\Vacina;
use App\Models\Consulta;
use App\Models\AttributesArrayTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Veterinario extends Model
{
    use HasFactory;
    use AttributesArrayTrait;

    protected int $id;
    protected string $nome;
    protected string $email;
    protected string $registro;
    protected string $password;
    protected $attributes = [];

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
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of registro
     */ 
    public function getRegistro()
    {
        return $this->registro;
    }

    /**
     * Set the value of registro
     *
     * @return  self
     */ 
    public function setRegistro($registro)
    {
        $this->registro = $registro;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
