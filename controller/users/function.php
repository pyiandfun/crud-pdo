<?php

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=crud-pdo', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error connecting to database: " . $e->getMessage());
    }

    if(isset($_POST['add'])) {

        $username=$_POST['user_name'];
        $email=$_POST['user_email'];
        

        // echo $name.$email;
        if(!empty($username && $email)){
            $insert=$pdo->prepare("INSERT INTO users(user_name,user_email) VALUES(:user_name,:user_email)");

            $insert->bindParam(':user_name',$username);
            $insert->bindParam(':user_email',$email);

            $insert->execute();

            if($insert->rowCount()) {

                header('Location:../../view/users/list.php');

            }else{

                header('Location:index.php');

            }
        }

        else{

            header('Location:index.php');
        }
    }   
?>