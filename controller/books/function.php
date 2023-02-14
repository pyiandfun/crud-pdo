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

                header('location:../../view/books/list.php');
                
            }else{

                header('location:add.php');

            }

        }
    }


   