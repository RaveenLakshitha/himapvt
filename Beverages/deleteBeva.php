<?php
@include '../config.php';
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM beverages WHERE B_Id = $id");
    header('location:beverages.php');
 };
 
?>