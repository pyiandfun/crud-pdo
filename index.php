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
                  <a class="nav-link active" aria-current="page" href="view/users/list.php">Users</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="view/books/list.php">Books</a>
              </li>
          </ul>
        </div>
      </div>
  </nav>
  <div class="container">
    <button class="btn btn-primary">
      <a href="view/users/login.php" class="text-light">Login</a>
    </button>
  </div>
  <div class="container">
    <div class="container">
      <a href="#"><i class="fa-solid fa-reply w-10 h-10"></i></a>
    </div>
    <p class="text-center text-primary p-3">Please register here.</p>
    <form action="controller/users/register.php" method="post" class="mx-auto my-5 w-25">

      <div class="form-group my-4">
        <label>Name</label>
        <input type="text" class="form-control" name="user_name" required>
      </div>

      <div class="form-group my-4">
        <label>Email</label>
        <input type="text" class="form-control" name="user_email" required>
      </div>

      <div class="form-group my-4">
        <label>New Password</label>
        <input type="password" class="form-control"  name="user_password" required>
      </div>

      <div class="form-group my-4">
        <label>Comfirm Password</label>
        <input type="password" class="form-control"  name="confirm_password" required>
      </div>

      <button type="submit" class="btn btn-secondary  m-auto my-3 text-center" name="add">Register</button>
    </form> 
  </div>

  <footer class="bg-secondary py-2">
    <div class="text-center py-2 text-light">&copy; all right reserved.</div>
  </footer>

</body>
</html>
