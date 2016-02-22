<?php

/**
 * Created by PhpStorm.
 * User: Rimas
 * Date: 1/28/2016
 * Time: 10:39 PM
 */
/*require 'config.php';


$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "testdb";*/
require 'config.php';

class Database
{
    protected $conn;
    protected $table;

    public function Connect($servername, $dbname, $username, $password){

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            echo 'Error ' . $e->getMessage();
            return false;
        }
    }

    public function setTable($table)
    {
        $this->table = $table;
    }
    public function AddData($name, $email, $password, $message){

        $sql = "INSERT INTO users (name, email, password, message) VALUES ('$name', '$email', '$password', '$message')";
        $this->conn->exec($sql);
    }

    public function userExists($name){
        if ($this->GetDataWhere('name', $name)) {
            return true;
        } else return false;

    }

    /*public function GetData(){
        try {
            $sql = "SELECT * from $this->table";
            return $this->conn->query($sql);
        }catch (PDOException $e) {
            echo 'Error ' . $e->getMessage();
            return false;
        }
    }*/

    public function GetDataWhere($key, $value){
        try {

            $stmt = $this->conn->prepare("SELECT * from users WHERE $key = :value");
            $stmt->bindParam(':value', $value);
            $stmt->execute();
            return $stmt->fetchAll();

        }catch (PDOException $e) {
            echo 'Error ' . $e->getMessage();
            return false;
        }
    }


    public function Close(){
        $this->conn = null;
    }
}