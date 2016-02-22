<?php

/**
 * Created by PhpStorm.
 * User: Rimas
 * Date: 1/27/2016
 * Time: 12:04 AM
 */

class User
{
    private $name;
    private $email;
    private $message;
    private $password;

    public function login(){
        echo ('Logging in '. $this->name);
    }

    public function logout(){
        echo 'Logging out';
    }


    public function setName($string){
        $validator = new Validator();
        if ($validator->validateName($string)){
        } $this->name = $string;

    }
    public function getName(){
        return $this->name;
    }


    public function setEmail($string){
        $validator = new Validator();
        if ($validator->validateEmail($string)){
        } $this->email = $string;

    }
    public function getEmail(){
        return $this->email;
    }

    public function setMessage($string){
        $this->message = $string;

    }
    public function getMessage(){
        return $this->message;
    }

    public function setPassword($string){
        $validator = new Validator();
        if ($validator->validatePassword($string) == false){
        } else $this->password = hash('sha256', $string);
    }
    public function getPassword(){
        return $this->password;
    }


}