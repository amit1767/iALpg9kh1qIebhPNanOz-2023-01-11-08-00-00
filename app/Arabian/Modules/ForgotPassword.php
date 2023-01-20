<?php

namespace App\Arabian\Modules;

use App\Arabian\Request;

class ForgotPassword extends Request
{

    public function getPathName()
    {
        return "forgot-password";
    }

    /**
     * Fetch All Records
     *
     * @param integer   $page  Current Page
     * @param integer $per_page No of records per page
     * @param string $fields Retrun only fields
     *
     * @throws Exception If token is not found
     * @return Json
     */
    public function all($page = 1, $per_page = 20, $modified_since = null)
    {
        return parent::all($page, $per_page);
    }
}
