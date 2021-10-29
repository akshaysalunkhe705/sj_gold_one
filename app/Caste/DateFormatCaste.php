<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class DateFormatCaste implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
        return date_format(date_create($value),"d/M/Y");
    }

    public function set($model, $key, $value, $attributes)
    {
        return date_format(date_create($value),"Y/m/d");
    }
}