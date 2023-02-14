<?php

include ('../../controller/users/function.php');

session_start();

if(!isset($_SESSION['usermail']) && !isset($_SESSION['userpassword'])){
    header("location: ../login.php");
  }

if(isset($_POST['edit'])) {

    $id=$_POST['id'];
    $username=$_POST['user_name'];
    $email=$_POST['user_email'];

    // var_dump($username);
    // var_dump($email);
    if(!empty($username && $email)) {

        $update=$pdo->prepare("UPDATE users SET user_name=:user_name,user_email=:user_email WHERE id=$id");

        $update->bindParam(':user_name',$username);
        $update->bindParam(':user_email',$email);

        $update->execute();

        // print_r($update);
        if($update->rowCount()) {

            $_SESSION['updatemsg']="ID number $id was Sucessfully updated.";

            header("Location: list.php");
            exit();

        }else{

            header("Location: list.php");
            
        }
    }
}
?>
