<?php

namespace bahman026\laravelResource;


class Conditions
{
    static function where($model, $column, $condition, $value)
    {
        return ['model' => $model, 'column' => $column, 'condition' => $condition, 'value' => $value];
    }

}
