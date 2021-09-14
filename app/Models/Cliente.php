<?php

namespace App\Models;

use App\Models\Animal;
use App\Models\Consulta;
use App\Models\AttributesArrayTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model implements Authenticatable
{
    use HasFactory;
    use AttributesArrayTrait;

    protected int $id;
    protected string $nome;
    protected string $email;
    protected string $password;
    protected $attributes = [];

    public function animais(){
        return $this->hasMany(Animal::class);
    }

    public function atualizaComDadosDB(){
        $this->setFromArray($this->attributes);
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

    public function getAuthIdentifierName(){
        return 'email';
    }
    public function getAuthIdentifier(){
        if(isset($this->email)){
            return $this->getEmail();
        }
        
        if(isset($this->attributes['email'])){
            return $this->attributes['email'];
        }

        return null;
    }

    public function getAuthPassword(){
        if(isset($this->password)){
            return $this->getPassword();
        }
       
        if(isset($this->attributes['password'])){
            return $this->attributes['password'];
        }

        return null;
    }
    
    public function getRememberToken(){}
    public function setRememberToken($value){}
    public function getRememberTokenName(){}
}

