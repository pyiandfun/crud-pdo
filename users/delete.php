<?php
include 'function.php';
session_start();
if(!isset($_SESSION['usermail']) && !isset($_SESSION['userpassword'])){
    header("location: ../login.php");
  }
if (isset($_GET['delete'])) { 
    $id = $_GET['id'];
    $delete=$pdo->prepare("DELETE FROM crud WHERE id=$id");
    $delete->execute();
    if($delete->rowCount()){
        session_start();
        $_SESSION['deletemsg']="Id $id was Sucessfully deleted.";
        header("location:list.php");
        exit();
    }
}