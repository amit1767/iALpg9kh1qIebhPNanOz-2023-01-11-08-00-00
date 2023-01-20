<?php


namespace App\Utils;


use Illuminate\Contracts\Support\Jsonable;

class ApiResponse implements Jsonable
{
    use JsonEncoadable;

    public $status;

    public $data;

    public $message;

    public $page;

    public $per_page;

    public $total;


}


