<?php
/**
 * Created by PhpStorm.
 * User: Rimas
 * Date: 2/1/2016
 * Time: 4:20 PM
 */
session_start();
session_destroy();
$_SESSION = array();
//delete cookie
header('Location: index.php');