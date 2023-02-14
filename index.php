<?php

    include ('controller/users/register.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>

  .body {
    background-image: url('view/assets/img/background_1.jpg');
    background-size: cover;
  }

</style>
<body>
  <div class="body">
    <nav class=" d-flex justify-content-around py-3 bg-light">
      <div>
        <a class="navbar-brand" href="#">Logo</a>
      </div>
      <div>
        <button class="btn btn-secondary">
          <a href="view/users/login.php" class="text-light">Login</a>
        </button>
      </div>
    </nav>
    <div class="container">
      <h4 class="text-center text-secondary pt-5">Please register here.</h4>
      <form action="controller/users/register.php" method="post" class="mx-auto my-5 w-25">

        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control rounded-0" name="user_name" required>
        </div>

        <div class="form-group my-4">
          <label>Email</label>
          <input type="text" class="form-control rounded-0" name="user_email" required>
        </div>

        <div class="form-group my-4">
          <label>New Password</label>
          <input type="password" class="form-control rounded-0"  name="user_password" required>
        </div>

        <div class="form-group my-4">
          <label>Confirm Password</label> 
          <input type="password" class="form-control rounded-0"  name="confirm_password" required>
        </div>
        <div class="m-auto text-center">
        <button type="submit" class="btn btn-secondary  m-auto my-3 text-center" name="add">Register</button>
        </div>
      </form> 
    </div>

    <footer class="bg-secondary py-2">
      <div class="text-center py-2 ">&copy; all right reserved.</div>
    </footer>
  </div>
</body>
</html>
