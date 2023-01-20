<?php
namespace App\Services;

use App\Arabian\Arabian;
use App\Arabian\Auth;


class ArabianServiceImpl implements ArabianService
{

    function login(string $username, string $password)
    {
        return Auth::login($username, $password);
    }

    function forgotpassword(string $username)
    {
        return Auth::forgotpassword($username);
    }

    function getUser($id)
    {
        return Arabian::users()->retrive($id);
    }

    function getUsers($page = 1, $per_page = 10, $projection = null)
    {
        return Arabian::users()->all($page, $per_page, $projection);
    }

    public function getCategories($page = 1, $per_page = 10, $projection = null)
    {
        return Arabian::categories()->all($page, $per_page, $projection);
    }

    function getArticles($page = 1, $per_page = 10, $projection = null)
    {
        return Arabian::articles()->all($page, $per_page, $projection);
    }

    function storeArticle($id, $queryParams, $params)
    {
        return Arabian::articles()->create($id, $queryParams, $params);
    }

    function editArticle($id)
    {
        return Arabian::articles()->get($id);
    }

    function updateArticle($id, $queryParams, $params)
    {
        return Arabian::articles()->update($id, $queryParams, $params);
    }

    function deleteArticle($id)
    {
        return Arabian::articles()->delete($id);
    }

}
