<?php

//definimos una clase
class Usuario {
    //propiedades (atributos)
    protected $nombre;
    protected $edad;
    public static $minPassLenght = 6;

    public static function validarPassword($pass){
        if(strlen($pass) >= self::$minPassLenght){
            return true;
        }else {
            return false;
        }
    }
}

$password='hola';

if(Usuario::validarPassword($password)){
    echo 'Contraseña valida';
}else {
    echo 'Contraseña invalida';
}


