<?php

namespace bahman026\laravelResource;

use Illuminate\Http\Resources\Json\JsonResource;


class Resource extends JsonResource
{


    public function toArray($request)
    {
        $arr = [];
        if (is_array($request) && !empty($request)) {
            foreach ($request as $key1 => $value1) {

                if (is_array($value1)) {
                    if (is_object($this->$key1)) {
                        $arr[$key1] = BResource::resource($this->$key1, $value1);
                    } else {
                        foreach ($value1 as $key2 => $value2) {
                            if ($this->$key1 != null) {
                                if (is_array($value2)) {
                                    if (is_object($this->$key1->$key2)) {
                                        $arr[$key1][$key2] = BResource::resource($this->$key1->$key2, $value2);
                                    } else {
                                        foreach ($value2 as $key3 => $value3) {
                                            if ($this->$key2 != null) {
                                                if (is_array($value3)) {
                                                    if (is_object($this->$key1->$key2->$key3)) {
                                                        $arr[$key1][$key2][$key3] = BResource::resource($this->$key1->$key2->$key3, $value3);
                                                    } else {
                                                        foreach ($value3 as $key4 => $value4) {

                                                            if (is_array($value4)) {
                                                                if (is_object($this->$key1->$key2->$key3->$key4)) {
                                                                    $arr[$key1][$key2][$key3][$key4] = BResource::resource($this->$key1->$key2->$key3->$key4, $value4);
                                                                } else {
                                                                    foreach ($value4 as $key5 => $value5) {


                                                                        if (is_array($value5)) {
                                                                            if (is_object($this->$key1->$key2->$key3->$key4->$key5)) {
                                                                                $arr[$key1][$key2][$key3][$key4][$key5] = BResource::resource($this->$key1->$key2->$key3->$key4->$key5, $value5);
                                                                            } else {
                                                                                foreach ($value5 as $key6 => $value6) {
                                                                                    $arr[$key1][$key2][$key3][$key4][$key5][$value6] = $this->$key1->$key2->$key3->$key4->$key5->$value6;
                                                                                }
                                                                            }
                                                                        } else {
                                                                            if (is_object($this->$key1->$key2->$key3->$key4->$value5)) {
                                                                                $arr[$key1][$key2][$key3][$key4][$value5] = BResource::resource($this->$key1->$key2->$key3->$key4->$value5, [$value5]);
                                                                            } else
                                                                                $arr[$key1][$key2][$key3][$key4][$value5] = $this->$key1->$key2->$key3->$key4->$value5;
                                                                        }

                                                                    }
                                                                }
                                                            } else {
                                                                if (is_object($this->$key1->$key2->$key3->$value4)) {
                                                                    $arr[$key1][$key2][$key3][$value4] = BResource::resource($this->$key1->$key2->$key3->$value4, [$value4]);
                                                                } else
                                                                    $arr[$key1][$key2][$key3][$value4] = $this->$key1->$key2->$key3->$value4;
                                                            }


                                                        }
                                                    }
                                                } else {
                                                    if (is_object($this->$key1->$key2->$value3)) {
                                                        $arr[$key1][$key2][$value3] = BResource::resource($this->$key1->$key2->$value3, [$value3]);
                                                    } else
                                                        $arr[$key1][$key2][$value3] = $this->$key1->$key2->$value3;
                                                }
                                            } else {
                                                $arr[$key2] = null;
                                            }

                                        }
                                    }
                                } else {
                                    if (is_object($this->$key1->$value2)) {
                                        $arr[$key1][$value2] = BResource::resource($this->$key1->$value2, [$value2]);
                                    } else
                                        $arr[$key1][$value2] = $this->$key1->$value2;
                                }
                            } else {
                                $arr[$key1] = null;
                            }

                        }
                    }
                } else {
                    if (is_object($this->$value1)) {
                        $arr[$value1] = BResource::resource($this->$value1, []);
                    } else
                        $arr[$value1] = $this->$value1;
                }
            }
            return ($arr);
        } else if ($request == null || empty($request) || $request == []) {
            return parent::toArray($request);
        }
        return $arr[$request] = $this->$request;

    }

}
