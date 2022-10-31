<?php
@include '../config.php';
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM cakes WHERE C_Id = $id");
    header('location:cakes.php');
 };
 
?>