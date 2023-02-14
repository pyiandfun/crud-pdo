<?php

try {

    $pdo = new PDO('mysql:host=localhost;dbname=crud-pdo', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die("Error connecting to database: " . $e->getMessage());
}


if(isset($_POST['add'])){

    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $confirm_password=$_POST['confirm_password'];

//     echo $user_name;
//     echo $user_email;
//     echo $user_password;
//     echo $confirm_password;
// }

    if(!empty($user_name && $user_email && $user_password && $confirm_password) && $user_password===$confirm_password) {
        
        $add=$pdo->prepare("INSERT INTO users(user_name,user_email, user_password, confirm_password) VALUES(:user_name, :user_email, :user_password, :confirm_password)");

        $add->bindParam(':user_name',$user_name);
        $add->bindParam(':user_email',$user_email);
        $add->bindParam(':user_password',$user_password);
        $add->bindParam(':confirm_password',$confirm_password);

        $add->execute();

        if( $add->rowCount() ){
            echo "Successful.";
            header("location: ../../view/users/login.php");
        }else{
            echo "fail";
            header("location: register.php");
        }
    }else{
        echo "Please check your password.";
        header("location: register.php");
        die("Error connecting to database: " . $e->getMessage());
    }

}




?>