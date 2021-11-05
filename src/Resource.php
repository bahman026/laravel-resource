<?php

namespace bahman026\laravelResource;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;


class Resource extends JsonResource
{


    public function toArray($column)
    {

        $request = $column['request'];
        $query = $column['query'];
        $model = $this;
        if (is_a($model, 'bahman026\laravelResource\Resource')) {
            $model = $this->resource;
        }
        $arr = [];
        if (is_array($request) && !empty($request)) {

            foreach ($request as $key1 => $value1) {

                if (is_array($value1)) {
                    if (is_object($model->$key1)) {
                        if (($array = self::getExistedModelInQuery($key1, $query)) != false) {
                            $arr[$key1] = $model->$key1;
                            foreach ($array as $item) {
                                $arr[$key1] = $arr[$key1]->where($item['column'], $item['condition'], $item['value']);
                            }

                        }
                        $arr[$key1] = array_values(BResource::resource($arr[$key1], $value1, null, $query));


                    } else {
                        foreach ($value1 as $key2 => $value2) {
                            if ($model->$key1 != null) {
                                if (is_array($value2)) {

                                    if (is_object($model->$key1->$key2)) {

                                        if (($array = self::getExistedModelInQuery($key2, $query)) != false) {
                                            $arr[$key1][$key2] = $model->$key1->$key2;
                                            foreach ($array as $item) {
                                                $arr[$key1][$key2] = $model->$key1->$key2->where($item['column'], $item['condition'], $item['value']);
                                            }
                                        }
                                        $arr[$key1][$key2] = array_values(BResource::resource($arr[$key1][$key2], $value2, null, $query));


                                    } else {
                                        foreach ($value2 as $key3 => $value3) {
                                            if ($model->$key2 != null) {
                                                if (is_array($value3)) {
                                                    if (is_object($model->$key1->$key2->$key3)) {

                                                        if (($array = self::getExistedModelInQuery($key3, $query)) != false) {
                                                            $arr[$key1][$key2][$key3] = $model->$key1->$key2->$key3;
                                                            foreach ($array as $item) {
                                                                $arr[$key1][$key2][$key3] = $model->$key1->$key2->$key3->where($item['column'], $item['condition'], $item['value']);
                                                            }
                                                        }
                                                        $arr[$key1][$key2][$key3] = array_values(BResource::resource($arr[$key1][$key2][$key3], $value3, null, $query));


                                                    } else {
                                                        foreach ($value3 as $key4 => $value4) {

                                                            if (is_array($value4)) {
                                                                if (is_object($model->$key1->$key2->$key3->$key4)) {

                                                                    if (($array = self::getExistedModelInQuery($key4, $query)) != false) {
                                                                        $arr[$key1][$key2][$key3][$key4] = $model->$key1->$key2->$key3->$key4;
                                                                        foreach ($array as $item) {
                                                                            $arr[$key1][$key2][$key3][$key4] = $model->$key1->$key2->$key3->$key4->where($item['column'], $item['condition'], $item['value']);
                                                                        }
                                                                    }
                                                                    $arr[$key1][$key2][$key3][$key4] = array_values(BResource::resource($arr[$key1][$key2][$key3][$key4], $value4, null, $query));

                                                                } else {
                                                                    foreach ($value4 as $key5 => $value5) {
                                                                        if (is_array($value5)) {
                                                                            if (is_object($model->$key1->$key2->$key3->$key4->$key5)) {

                                                                                if (($array = self::getExistedModelInQuery($key5, $query)) != false) {
                                                                                    $arr[$key1][$key2][$key3][$key4][$key5] = $model->$key1->$key2->$key3->$key4->$key5;
                                                                                    foreach ($array as $item) {
                                                                                        $arr[$key1][$key2][$key3][$key4][$key5] = $model->$key1->$key2->$key3->$key4->$key5->where($item['column'], $item['condition'], $item['value']);
                                                                                    }
                                                                                }
                                                                                $arr[$key1][$key2][$key3][$key4][$key5] = array_values(BResource::resource($arr[$key1][$key2][$key3][$key4][$key5], $value5, null, $query));


                                                                            } else {
                                                                                foreach ($value5 as $key6 => $value6) {
                                                                                    $arr[$key1][$key2][$key3][$key4][$key5][$value6] = $model->$key1->$key2->$key3->$key4->$key5->$value6;
                                                                                }
                                                                            }
                                                                        } else {
                                                                            if (($array = self::getExistedModelInQuery($value1, $query)) != false) {
                                                                                $arr[$key1][$key2][$key3][$key4][$value5] = $model->$key1->$key2->$key3->$key4->$value5;
                                                                                foreach ($array as $item) {
                                                                                    $arr[$key1][$key2][$key3][$key4][$value5] = $model->$key1->$key2->$key3->$key4->$value5->where($item['column'], $item['condition'], $item['value']);
                                                                                }
                                                                                $arr[$key1][$key2][$key3][$key4][$value5] = array_push($arr[$key1][$key2][$key3][$key4][$value5]->toArray());
                                                                            } else {
                                                                                if (is_object($model->$key1->$key2->$key3->$key4->$value5))
                                                                                    $arr[$key1][$key2][$key3][$key4][$value5] = $model->$key1->$key2->$key3->$key4->$value5->toArray();
                                                                                else
                                                                                    $arr[$key1][$key2][$key3][$key4][$value5] = $model->$key1->$key2->$key3->$key4->$value5;

                                                                            }


                                                                        }

                                                                    }
                                                                }
                                                            } else {

                                                                if (($array = self::getExistedModelInQuery($value1, $query)) != false) {
                                                                    $arr[$key1][$key2][$key3][$value4] = $model->$key1->$key2->$key3->$value4;
                                                                    foreach ($array as $item) {
                                                                        $arr[$key1][$key2][$key3][$value4] = $model->$key1->$key2->$key3->$value4->where($item['column'], $item['condition'], $item['value']);
                                                                    }

                                                                    $arr[$key1][$key2][$key3][$value4] = array_values($arr[$key1][$key2][$key3][$value4]->toArray());
                                                                } else {
                                                                    if (is_object($model->$key1->$key2->$key3->$value4))
                                                                        $arr[$key1][$key2][$key3][$value4] = $model->$key1->$key2->$key3->$value4->toArray();
                                                                    else
                                                                        $arr[$key1][$key2][$key3][$value4] = $model->$key1->$key2->$key3->$value4;

                                                                }

                                                            }

                                                        }
                                                    }
                                                } else {

                                                    if (($array = self::getExistedModelInQuery($value1, $query)) != false) {
                                                        $arr[$key1][$key2][$value3] = $model->$key1->$key2->$value3;
                                                        foreach ($array as $item) {
                                                            $arr[$key1][$key2][$value3] = $model->$key1->$key2->$value3->where($item['column'], $item['condition'], $item['value']);
                                                        }
                                                        $arr[$key1][$key2][$value3] = array_values($arr[$key1][$key2][$value3]->toArray());
                                                    } else {
                                                        if (is_object($model->$key1->$key2->$value3))
                                                            $arr[$key1][$key2][$value3] = $model->$key1->$key2->$value3->toArray();
                                                        else
                                                            $arr[$key1][$key2][$value3] = $model->$key1->$key2->$value3;
                                                    }

                                                }
                                            } else {
                                                $arr[$key2] = null;
                                            }

                                        }
                                    }
                                } else {

                                    if (($array = self::getExistedModelInQuery($value1, $query)) != false) {
                                        $arr[$key1][$value2] = $model->$key1->$value2;
                                        foreach ($array as $item) {
                                            $arr[$key1][$value2] = $model->$key1->$value2->where($item['column'], $item['condition'], $item['value']);
                                        }

                                        $arr[$key1][$value2] = array_values($arr[$key1][$value2]->toArray());
                                    } else {
                                        if (is_object($model->$key1->$value2))
                                            $arr[$key1][$value2] = $model->$key1->$value2->toArray();
                                        else
                                            $arr[$key1][$value2] = $model->$key1->$value2;
                                    }

                                }
                            } else {
                                $arr[$key1] = null;
                            }

                        }
                    }
                } else {
                    if (($array = self::getExistedModelInQuery($value1, $query)) != false) {
                        $arr[$value1] = $model->$value1;
                        foreach ($array as $item) {
                            $arr[$value1] = $model->$value1->where($item['column'], $item['condition'], $item['value']);
                        }
                        $arr[$value1] = array_values($arr[$value1]->toArray());
                    } else {
                        if (is_object($model->$value1))
                            $arr[$value1] = $model->$value1->toArray();
                        else
                            $arr[$value1] = $model->$value1;

                    }


                }
            }
            return ($arr);
        } else if ($request == null || empty($request) || $request == []) {
            return parent::toArray($request);
        }

        if (($array = self::getExistedModelInQuery($request, $query)) != false) {
            if (is_object($model->$request)) {
                $arr[$request] = array_values($model->$request->where($array['column'], $array['condition'], $array['value'])->toArray());
            } else {

                if ($model->$request === $query['value']) {
                    $arr[$request] = $model->$request;
                }
            }
        } else {
            if (is_object($model->$request))
                $arr[$request] = $model->$request->toArray();
            else
                $arr[$request] = $model->$request;
        }
        return $arr;
    }


    public static function getExistedModelInQuery($model, $array)
    {
        $arr = [];
        if (array_key_exists('model', $array)) {
            if ($array['model'] == $model)
                return $array;
            return false;
        }

        foreach ($array as $items) {
            if ($items['model'] == $model) {
                array_push($arr, $items);
            }

        }
        if ($arr != [])
            return $arr;
        return false;

    }

}
