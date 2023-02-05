<?php
include 'function.php';
if (isset($_GET['delete'])) { 
    $id = $_GET['id'];
    $delete=$pdo->prepare("DELETE FROM crud WHERE id=$id");
    $delete->execute();
    if($delete->rowCount()){
        session_start();
        $_SESSION['msg']="Sucess deleting row.";
        header("location:list.php");
        exit();
    }
}