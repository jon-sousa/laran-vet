<?php 

namespace App\Providers;

use Illuminate\Contracts\Auth\Guard;

class ClienteGuard implements Guard
{
    protected $provider;
    protected $user;

    public function __construct(UserProvider $provider)
  {
    $this->request = $request;
    $this->provider = $provider;
    $this->user = NULL;
  }

  public function check()
  {
    return ! is_null($this->user());
  }

  public function guest()
  {
    return ! $this->check();
  }

  public function user()
  {
    if (! is_null($this->user)) {
      return $this->user;
    }
  }

  public function id()
  {
    if ($user = $this->user()) {
      return $this->user()->getAuthIdentifier();
    }
  }

  public function validate(Array $credentials=[])
  {
    if (empty($credentials['email']) || empty($credentials['password'])) {
      if (!$credentials=$this->getJsonParams()) {
        return false;
      }
    }
 
    $user = $this->provider->retrieveByCredentials($credentials);
       
    if (! is_null($user) && $this->provider->validateCredentials($user, $credentials)) {
      $this->setUser($user);
 
      return true;
    } else {
      return false;
    }
  }

  public function getJsonParams()
  {
    $jsondata = $this->request->input();
 
    return (!empty($jsondata) ? json_decode($jsondata, TRUE) : NULL);
  }
 
  /**
   * Set the current user.
   *
   * @param  Array $user User info
   * @return void
   */
  public function setUser(Authenticatable $user)
  {
    $this->user = $user;
    return $this;
  }
}