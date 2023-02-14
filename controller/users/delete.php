<?php
include 'function.php';

session_start();

if(!isset($_SESSION['usermail']) && !isset($_SESSION['userpassword'])) {

    header("location: ../login.php");

  }


if (isset($_GET['delete'])) { 

    $id = $_GET['id'];

    $delete=$pdo->prepare("DELETE FROM users WHERE id=$id");
    $delete->execute();

    if($delete->rowCount()) {

        $_SESSION['deletemsg']="Id $id was Sucessfully deleted.";
        header("location: ../../view/books/list.php");
        exit();
        
    }
}