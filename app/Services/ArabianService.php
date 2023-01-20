<?php
namespace App\Services;

interface ArabianService
{

    /**
     * @api login
     * @param null $projection  Projection Fields i.e comman saperated field names of the deals like Account_Name.
     * @return \App\Arabian\Modules\Json
     */
    function login(string $username, string $password);

    /**
     * @api forgotpassword
     * @param null $projection  Projection Fields i.e comman saperated field names of the deals like Account_Name.
     * @return \App\Arabian\Modules\Json
     */
    function forgotpassword(string $username);

    /**
     * @param $id User ID
     * @return \App\Arabian\Json|bool|null
     */
    function getUser($id);

    /**
     * @api getUsers
     * @param int $page         Paggination Current Page
     * @param int $per_page     No Of Items In Per Page
     * @param null $projection  Projection Fields i.e comman saperated field names of the deals like Account_Name.
     * @return \App\Arabian\Modules\Json
     */
    function getUsers($page = 1, $per_page = 10, $projection = null);

    /**
     * @api getCategories
     * @param int $page         Paggination Current Page
     * @param int $per_page     No Of Items In Per Page
     * @param null $projection  Projection Fields i.e comman saperated field names of the deals like Account_Name.
     * @return \App\Arabian\Modules\Json
     */
    function getCategories($page = 1, $per_page = 10, $projection = null);

    /**
     * @api getArticles
     * @param int $page         Paggination Current Page
     * @param int $per_page     No Of Items In Per Page
     * @param null $projection  Projection Fields i.e comman saperated field names of the deals like Account_Name.
     * @return \App\Arabian\Modules\Json
     */
    function getArticles($page = 1, $per_page = 10, $projection = null);

    /**
     * @api getArticles
     * @param int $page         Paggination Current Page
     * @param int $per_page     No Of Items In Per Page
     * @param null $projection  Projection Fields i.e comman saperated field names of the deals like Account_Name.
     * @return \App\Arabian\Modules\Json
     */
    function storeArticle($id, $queryParams, $params);
    
    /**
     * @api editArticle
     * @param int $id Article Id
     * @return \App\Arabian\Modules\Json
     */
    function editArticle($id);

    /**
     * @api updateArticle
     * @param int $id Article Id
     * @return \App\Arabian\Modules\Json
     */
    function updateArticle($id, $queryParams, $params);

    /**
     * @api deleteArticle
     * 
     * @return \App\Arabian\Modules\Json
     */
    function deleteArticle($id);
}
