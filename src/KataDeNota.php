<?php

namespace Deg540\KataDeNota;

use PHPUnit\Framework\Constraint\IsEqual;
use function PHPUnit\Framework\equalTo;
use function PHPUnit\Framework\isNull;

class KataDeNota
{
    private $count = 0; 
    public function getList(String $action){
        $accion = strtolower($action);
        $accionArray = preg_split("/[ ]/",$accion);
        if($accionArray[0] == "vaciar"){
            $this->count = 0;
            return '';
        } 
        if($accionArray[0] == "eliminar"){
            if($this->count > 0){
                $this->count = 0;
                return '';
            } 
            return 'El producto seleccionado no existe';
        } 
        if($accionArray[0] != "añadir"){
            return '';
        } 
        if(2 != count($accionArray)){
            $this->count += $accionArray[2];
        } else{
            $this->count += 1;
        } 
        
        return "pan x".$this->count;
    } 
}