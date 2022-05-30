<?php
session_start();
if (!isset($_SESSION['is_login']) && !$_SESSION['is_login']) {
    header('Location: login.php');
}

$id =  $_POST['cat_id'];
require_once "DB_Connection.php";
if ($connection->query("delete from category where id = $id")){
    header("Location: show_category.php");
}
