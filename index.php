<?php
include ('function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
  <div class="container">
  <form action="function.php" method="post">
    <div action="form-group" action="function.php" method="post">
      <label>Name</label>
      <input type="text" class="form-control" placeholder="username" name="username">
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="email" class="form-control" placeholder="email" name="email">
    </div>
    <button type="submit" class="btn btn-primary" name="add">Submit</button>
  </form>   
  </div>
</body>
</html>
