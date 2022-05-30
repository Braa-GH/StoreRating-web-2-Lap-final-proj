<?php
$store_id = $_POST['store_id'];
include_once "DB_Connection.php";
            $rating = $_POST['rating'];
            $query = "update store set rates_number = rates_number + 1 , rate = rate + $rating where id = $store_id ";
            if (isset($_COOKIE["$store_id"])){
                header("Location: die.php");
            }else{
                if ($connection->query($query)){
                    setcookie("$store_id", "$store_id", time()+3600);
                    header("Location: profile.php");
                }
            }





