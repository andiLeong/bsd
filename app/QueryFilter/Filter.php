<?php

namespace App\QueryFilter;


use Illuminate\Support\Str;

abstract class Filter
{

    protected function getFilterName()
    {
        return Str::snake(class_basename( $this ));
    }


    abstract public function apply($builder);
}