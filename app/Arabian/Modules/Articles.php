<?php

namespace App\Arabian\Modules;

use App\Arabian\Request;

class Articles extends Request
{
    public function list(array $params = [])
    {
        $response = $this->get($params);
        if (!$response) return null;

        return $response->users;
    }

    public function getArticle($usersId)
    {
      $response = $this->get($usersId);
      if (!$response) return null;

      return $response->users;
    }

    public function getPathName()
    {
        return "articles";
    }

    public function all($page = 1, $per_page = 20, $modified_since = null)
    {
        return parent::all($page, $per_page);
    }


}
