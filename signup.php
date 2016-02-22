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
    if ($validator->validateName($_POST['name']) == false) echo('Please enter name');
    if ($validator->validateName($_POST['email']) == false) echo('Please enter email');
    if ($validator->validatePassword($_POST['password']) == false) echo('Please enter password');

    if ($validator->validateName($_POST['name']) && $validator->validateName($_POST['email']) && $validator->validatePassword($_POST['password']))
    {
        $user1 = new User();
        $user1->setName($_POST['name']);
        $user1->setEmail($_POST['email']);
        $user1->setPassword($_POST['password']);
        $user1->setMessage($_POST['message']);

        $database = new Database();
        if ($database->Connect($servername, $dbname, $username, $password)) {
            $database->setTable('users');
            if (!$database->userExists($_POST['name'])) {
                $database->AddData($user1->getName(), $user1->getEmail(), $user1->getPassword(), $user1->getMessage());

                session_start();
                $_SESSION['username'] = $_POST['name'];
                header("Location: admin.php");

            } else echo "User exists";
            $database->Close();
        }

    }
}

/* sql to create table
$sql = "CREATE TABLE Users(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL, email VARCHAR(50), password VARCHAR(255),  message VARCHAR(255))";
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
<form id="myForm" action="" method="post">
    <h3>Contact information </h3>
    <fieldset class="fieldset" >

        <legend>Personal information</legend>
        <input id="name" name="name" type="text" required placeholder="Name" class="input">
        <br>

        <input id="email" name="email" type="email" required placeholder="email@mail.com" class="input">
        <br>

        <input id="password" name="password" type="password" required placeholder="password" class="input">
        <br>

    </fieldset>

    <fieldset class="fieldset">
        <legend>Message:</legend>
        <textarea id="message" name="message" rows="2" cols="30" class="input"> </textarea>
    </fieldset>

    <input type="submit" value="Sign up" class="input">


</form>

</body>
</html>
