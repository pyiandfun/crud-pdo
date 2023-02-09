<?php
session_start();
if(!isset($_SESSION['usermail']) && !isset($_SESSION['userpassword'])){
    header("location: ../login.php");
  }
include('function.php');
if(isset($_POST['edit'])){
    $id=$_POST['id'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    // var_dump($username);
    // var_dump($email);
    if(!empty($username && $email)){
        $update=$pdo->prepare("UPDATE crud SET username=:username,email=:email WHERE id=$id");
        $update->bindParam(':username',$username);
        $update->bindParam(':email',$email);
        $update->execute();
        // print_r($update);
        if($update->rowCount()){
            session_start();
            $_SESSION['updatemsg']="ID number $id was Sucessfully updated.";
            header("Location: list.php");
            exit();
        }else{
            header("Location: list.php");
        }
    }
}
?>
