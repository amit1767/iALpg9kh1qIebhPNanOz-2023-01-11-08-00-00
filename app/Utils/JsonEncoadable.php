<?php


namespace App\Utils;


trait JsonEncoadable
{

    public function toJson($options = 0, bool $removeNull = true)
    {
        $props = get_object_vars($this);

        $array = [];
        foreach ($props as $key => $val)
        {
         if ($removeNull){
             if (isset($val)){
                 $array[$key] = $val;
             }
         }
         else
         {
             $array[$key] = $val;
         }
        }
        return json_encode($array);
    }
}
