<?php

include ('../../controller/books/function.php');

session_start();

if(!isset($_SESSION['usermail']) && !isset($_SESSION['userpassword'])){
    header("location: ../login.php");
  }

if(isset($_POST['update'])) {

    $id=$_POST['id'];
    $bookname=$_POST['bookname'];
    $author=$_POST['author'];
    $price=$_POST['price'];

    // print_r($bookname);
    // print_r($author);
    // var_dump($price);

    if(!empty($bookname) && !empty($author) && !empty($price)) {

        $update=$pdo->prepare("UPDATE books SET bookname=:bookname,author=:author,price=:price WHERE id=$id");
        $update->bindParam(':bookname',$bookname);
        $update->bindParam(':author',$author);
        $update->bindParam(':price',$price);
        $update->execute();

        if($update->rowCount()) {

            $_SESSION['updatemsg']="ID number $id was Sucessfully updated.";
            header("Location: list.php");
            exit();

        }else {

            echo "fail";
            header("Location: list.php");
            
        }
    }
}
?>
