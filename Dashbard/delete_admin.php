<?php
session_start();
if (!isset($_SESSION['is_login']) && !$_SESSION['is_login']) {
    header('Location: login.php');
}


$id =  $_POST['id'];
require_once "DB_Connection.php";
if ($connection->query("delete from admin where id = $id")){
    header("Location: show_admin.php");
}