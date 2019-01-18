<?php

session_start();
require_once './connect.php';

$id = $_GET['id'];



//var_dump($user);

$update_orderstat_query = "UPDATE orders SET status_id=3 WHERE id=$id;";



$result = mysqli_query($conn, $update_orderstat_query);


header("location: ../views/orders.php");

 ?>