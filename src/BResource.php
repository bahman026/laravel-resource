<?php

namespace bahman026\laravelResource;




class BResource
{

    static function resource($model, $columns, $dataName = null,$query=null)
    {
        try {
            $resource = Resource::collection($model);
        } catch (\BadMethodCallException $badMethodCallException) {
            $resource = new Resource($model);
        }
        if ($dataName == null)
            return $resource->toArray(['request'=>$columns,'query'=>$query]);
        else
            return [$dataName => $resource->toArray(['request'=>$columns,'query'=>$query])];

    }
}

