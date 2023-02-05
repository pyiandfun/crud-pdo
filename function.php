<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=crud-pdo', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error connecting to database: " . $e->getMessage());
}

if(isset($_POST['add'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    // echo $name.$email;
    if(!empty($username && $email)){
        $insert=$pdo->prepare("INSERT INTO crud(username,email) VALUES(:username,:email)");
        $insert->bindParam(':username',$username);
        $insert->bindParam(':email',$email);
        $insert->execute();
        if($insert->rowCount()){
            header('Location:list.php');
        }else{
            header('Location:index.php');
        }
    }
    else{
        header('Location:index.php');
    }
}



?>