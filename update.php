<?php
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
            header("Location: list.php");
        }else{
            header("Location: list.php");
        }
    }
}


// if (isset($_POST['delete'])) { 
//     $id = $_POST['id'];
//     $username=$_POST['username'];
//     $email=$_POST['email'];
//     $delete=$pdo->prepare("DELETE FROM crud WHERE id=$id");
//     $delete->execute();
//     if($delete->rowCount()){
//         echo "id$id is successfully deleted!"; 
//         header('Location:list.php');
//         echo "id$id is successfully deleted!";      
        
//     }
// }
?>
