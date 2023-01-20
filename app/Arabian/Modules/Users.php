<?php

namespace App\Arabian\Modules;

use App\Arabian\Request;

class Users extends Request
{

  public function list(array $params = [])
  {
    $response = $this->get($params);
    if (!$response) return null;

    return $response->users;
  }

  public function getUsers($usersId)
  {
    $response = $this->get($usersId);
    if (!$response) return null;

    return $response->users;
  }

    public function getPathName()
    {
        return "users";
    }
}
