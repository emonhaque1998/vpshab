<?php
namespace App\Http\Controllers\Admin\helper;

use App\Http\Controllers\Admin\Helper\Variable;

class AdminHelperClasses extends Variable{
    function getCheckChanges($requestData, $signleProduct){
        // dd($requestData);
        foreach($this->checkArray as $check){
            if($requestData[$check] !== $signleProduct[$check]){
                return false;
            }
        }
    }
}
