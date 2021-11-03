<?php

namespace bahman026\laravelResource;

use Illuminate\Http\Resources\Json\JsonResource;


class Resource extends JsonResource
{


    public function toArray($request)
    {
        $arr = [];
        if (is_array($request)) {
            foreach ($request as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $key2 => $value2) {
                        if (is_array($value2)) {
                            foreach ($value2 as $key3 => $value3) {
                                $arr[$key2][$value3] = $this->$key2->$value3;
                            }
                        } else {
                            $arr[$key][$value2] = $this->$key->$value2;
                        }
                    }
                } else {
                    $arr[$value] = $this->$value;
                }
            }
            return ($arr);
        }
        return $arr[$request] = $this->$request;

    }

}
