<?php

include ('../../controller/books/function.php');

session_start();
if(!isset($_SESSION['usermail']) && !isset($_SESSION['userpassword'])){
  header("location: ../login.php");
}

$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light h-25">
  <div class="container">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../users/list.php">Users</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="list.php">Books</a>
          </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <a href="<?= $previous ?>"><i class="fa-solid fa-reply w-10 h-10"></i></a>
</div>
<div class="container" style="height: 450px;">
  <h3 class="text-center p-3">Add new books</h3>
  <form action="../../controller/books/function.php" method="post" class="mx-auto my-5 w-75">
    <div action="form-group m-3">
      <label>Book's Name</label>
      <input type="text" class="form-control form-control-sm" placeholder="Book's Name" name="bookname">
    </div>
    <div class="form-group my-3">
      <label>Author</label>
      <input type="text" class="form-control form-control-sm" placeholder="author" name="author">
    </div>
    <div class="form-group my-3">
      <label>Price</label>
      <input type="number" min="0" class="form-control form-control-sm" placeholder="Price" name="price">
    </div>
    <button type="submit" class="btn btn-secondary my-3" name="add">Submit</button>
  </form> 
</div>  
<footer class="bg-secondary py-2">
  <div class="text-center py-2 text-light">&copy; all right reserved.</div>
</footer>
</body>
</html>
