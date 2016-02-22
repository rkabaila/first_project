<?php
/**
 * Created by PhpStorm.
 * User: Rimas
 * Date: 1/27/2016
 * Time: 12:03 AM
 */
require 'config.php';
require 'autoload.php';

if (!empty($_POST)) {

    $validator = new Validator();
    if ($validator->validateName($_POST['name']) && $validator->validateName($_POST['password'])) {

        $database = new Database();
        if ($database->Connect($servername, $dbname, $username, $password)) {
            $database->setTable('users');
            $data = $database->GetDataWhere( 'name', $_POST['name']);
            $database->Close();
        }
        if ($data) {
            foreach ($data as $row) {
                if ($row['password'] === hash('sha256', $_POST['password'])) {



                    session_start();
                    $_SESSION['username'] = $_POST['name'];
                    header("Location: admin.php");

                }else echo "Incorrect password";
            }


        } else echo "Incorrect name";


    }
}


/* sql to create table
$sql = "CREATE TABLE Users(name VARCHAR(30) NOT NULL, email VARCHAR(50), password VARCHAR(255), message VARCHAR(255))";
$conn->exec($sql);*/

/*
        $results = $conn->query('SELECT * FROM users');

        foreach ($results as $row){
            print_r($row);
        }*/

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="page.css">
    <title></title>

</head>
<body class="body">
<form id="myForm" action="login.php" method="post">

    <fieldset class="fieldset" >

        <legend>Login</legend>
        <input id="name" name="name" type="text" required placeholder="Name" class="input">
        <br>

        <input id="password" name="password" type="password" required placeholder="password" class="input">
        <br>

    </fieldset>


    <input type="submit" value="Login" class="input">


</form>

</body>
</html>