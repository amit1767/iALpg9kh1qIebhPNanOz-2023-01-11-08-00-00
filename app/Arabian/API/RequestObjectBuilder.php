<?php


namespace App\Arabian\API;


use App\Arabian\RequestObject;

class RequestObjectBuilder {
    private $queryParam = null;

    private $headerParam = null;

    private $formParam = null;

    private $method = "GET";

    private $endpoint = "";

    function addPathSegment ($segment){
        if ($segment)
            $this->endpoint .= $segment;

        return $this;
    }
    function setMethod($method){
        $this->method = $method;
        return $this;
    }
    function addHeader($key, $value) {
        if (!$this->queryParam)
            $this->queryParam = [];

        $this->queryParam[$key] = $value;
        return $this;
    }

    private function addValuesFromArray($toArray, $fromArray){
        array_push($toArray, $fromArray);
    }
    function addHeaderFromArry($param) {
        if (!$this->queryParam)
            $this->queryParam = [];

        $this->addHeaderFromArry($this->headerParam, $param);
    }

    function addQueryParam($key, $value){
        if (!$this->queryParam)
            $this->queryParam = [];

        $this->queryParam[$key] = $value;
        return $this;
    }

    function addQueryParamFromArray($param){
        if (!$this->queryParam)
            $this->queryParam = [];

        $this->addHeaderFromArry($this->queryParam, $param);
        return $this;
    }

    function addFromParamFromArray($param){
        if (!$this->formParam)
            $this->formParam = [];

        $this->addHeaderFromArry($this->formParam, $param);
        return $this;
    }
    function addFromParam($key, $value){
        if (!$this->formParam)
            $this->formParam = [];

        $this->formParam[$key] = $value;
        return $this;
    }

    function addPage($number) {
        return $this->addQueryParam("page", $number);
    }

    function addPerPage($number) {
        return $this->addQueryParam("per_page", $number);
    }

    function addModifiedSince($date) {
        return $this->addHeader("If-Modified-Since", $date);
    }

    function addFields($fileds) {
        return $this->addQueryParam("fields", $fileds);
    }

    function build() {
        $obj = new \App\Arabian\API\RequestObject();
        $obj->headers = $this->headerParam;
        $obj->queryParam = $this->queryParam;
        $obj->formParam = $this->formParam;
        $obj->method = $this->method;
        $obj->endpoint = $this->endpoint;
        return $obj;
    }

}
