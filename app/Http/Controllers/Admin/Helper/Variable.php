<?php
namespace App\Http\Controllers\Admin\helper;

class Variable{
    public $checkArray;

    function __construct($checkArray)
    {
        $this->checkArray = $checkArray;
    }
}
