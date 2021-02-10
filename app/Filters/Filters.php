<?php

namespace App\Filters;

use Illuminate\Http\Request;

abstract class Filters
{
    protected $request;
    protected $builder;
    protected $filters = [];

    public function __construct(Request $request){
        $this->request = $request;
    }

    public function apply($builder){
        $this->builder = $builder;

        //'orderby' => 'desc', 'by' => 'username'
        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)) {
               /* echo $filter;
                echo "<br>";*/
                $this->$filter($value);
            }
        }
        //exit;
        return $this->builder;
    }

    public function getFilters(){        
        return $this->request->all($this->filters);
    }
}
