<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<?php

    try {

        $pdo = new PDO('mysql:host=localhost;dbname=crud-pdo', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {

        die("Error connecting to database: " . $e->getMessage());

    }

    if( isset($_POST['add']) ) {

        $bookname=$_POST['bookname'];
        $author=$_POST['author'];
        $price=$_POST['price'];

        if( !empty($bookname && $author && $price) ) {

            $add=$pdo->prepare("INSERT INTO books(bookname,author,price) VALUES(:bookname,:author,:price)");

            $add->bindParam(':bookname',$bookname);
            $add->bindParam(':author',$author);
            $add->bindParam(':price',$price);

            $add->execute();

            if( $add->rowCount() ) {

                header('location:list.php');
                
            }else{

                header('location:index.php');

            }

        }
    }


   