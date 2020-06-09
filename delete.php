<?php 
session_start();
    include 'connection.php';
    $id=(int) $_GET['id'];
    $result= $connection->query("delete from subject where id=$id")or die($connection->error);
    if($result)
    {
        $_SESSION["success"]="1";
        header("Location:forms/deleteview.php");
    }
    
?>