<?php

namespace bahman026\laravelResource;


use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Resources\Json\JsonResource;


class BResource
{

    static function resource($model, $columns, $dataName = null)
    {

        try {
            $resource = Resource::collection($model);
        } catch (\BadMethodCallException $badMethodCallException) {
            $resource = new Resource($model);
        }
        if ($dataName == null)
            return $resource->toArray($columns);
        else
            return [$dataName => $resource->toArray($columns)];

    }
}

