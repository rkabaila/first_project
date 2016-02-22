<?php
/**
 * Created by PhpStorm.
 * User: Rimas
 * Date: 2/1/2016
 * Time: 4:20 PM
 */
require 'autoload.php';
require 'config.php';

session_start();
if (!isset($_SESSION['username'])){
    header('Location: login.php');
    die();
}
$database = new Database();
if ($database->Connect($servername, $dbname, $username, $password)) {
    $database->setTable('users');
    $row = $database->GetDataWhere( 'name', $_SESSION['username']);
    $database->Close();
}
//foreach($data as $row){
    $user1 = new User();
    $user1->setName($row[0]['name']);
    $user1->setEmail($row[0]['email']);
    $user1->setPassword($row[0]['password']);
    $user1->setMessage($row[0]['message']);
//}


echo ("Hello, " . $_SESSION['username']. "<br/>");
echo ("Your contact information :" . "<br/>")   ;
echo ("Name: " . $user1->getName() . "<br/>");
echo ("Email: " . $user1->getEmail() . "<br/>");
echo ("Message: " . $user1->getMessage() . "<br/>");


if (!empty($_POST)){
    header('Location: logout.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="page.css">
    <title></title>

</head>
<body class="body">
<form id="myForm" action="admin.php" method="post">

    <input type="submit" value="Logout" name='logout' class="input">


</form>

</body>
</html>
