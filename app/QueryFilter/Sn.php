<?php

namespace App\QueryFilter;

class Sn extends Filter
{
    public function apply($query)
    {
        return $query->where($this->getFilterName(), request($this->getFilterName()) );
    }
}