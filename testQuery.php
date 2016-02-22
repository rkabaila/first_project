<?php
/**
 * Created by PhpStorm.
 * User: Rimas
 * Date: 2/5/2016
 * Time: 3:26 PM
 */
require 'Database.php';

$database = new Database();
if ($database->Connect($servername, $dbname, $username, $password)) {
    $database->setTable('users');
    $data = $database->GetData('name', 'Rimas');
    $database->Close();
}
if ($data) {
    foreach ($data as $row) {
        //print_r($row);
        echo $row[0] . '<br>';
        echo $row[1] . '<br>';
        echo $row[2] . '<br>';
        echo $row[3] . '<br>';
        echo $row[4] . '<br>';
    }


}