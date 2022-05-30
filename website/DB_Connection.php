<?php

$connection = mysqli_connect("localhost" , "root", "", "store_rating");
if (!$connection){
    die("Database connection error!");
}

