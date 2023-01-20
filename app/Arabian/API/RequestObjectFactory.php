<?php


namespace App\Arabian\API;




class RequestObjectFactory {
    static function GetRequest($endpoint, $page, $per_page, $last_modified) {
        return (new RequestObjectBuilder())
            ->setMethod("GET")
            ->addPage($page)
            ->addPerPage($per_page)
            ->addModifiedSince($last_modified)
            ->addPathSegment($endpoint)
            ->build();
    }
}
