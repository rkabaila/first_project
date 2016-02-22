<?php

/**
 * Created by PhpStorm.
 * User: Rimas
 * Date: 1/27/2016
 * Time: 12:42 AM
 */
class Validator
{
    const MINCHARS = 3;

    public function validateName($string){
        if ($string == null) return false;
        else return true;
    }
    public function validateEmail($string){
        if ($string == null) return false;
        else return true;
    }
    public function validatePassword($string){
        return strlen($string) < self::MINCHARS ? false : true;
    }
}