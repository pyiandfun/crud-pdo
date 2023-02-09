<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    button{   
        display: inline;
    }
</style>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light h-25">
            <div class="container">
                <a class="navbar-brand" href="#">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Books</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="form my-5" style="height: 360px;">
        <form class="w-25 m-auto justify-content-center" action="" method="post">
            <?php
                if(!empty($_SESSION) && !isset($_SESSION['useremail']) && !isset($_SESSION['userpassword'])){
                    echo '<div class="text-center text-danger">'.$_SESSION['incorrectmsg'].'</div>';
                    unset($_SESSION['incorrectmsg']);
                } 
            ?>
                <input type="email" class="form-control my-2" placeholder="email" name="email" required>
                <input type="password" class="form-control form-control-sm" placeholder="password" name="password" required>
                <br>
                <button class="btn text-justify d-block m-auto py-2 btn-secondary" type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
    <footer class="bg-secondary">
        <div class="text-center py-2">&copy; all right reserved.</div>
    </footer>
</body>
</html>

<?php
if(isset($_POST['login'] )){
    // get values from input form
    $useremail = $_POST['email'];
    $userpassword = $_POST['password'];

    // add email and password in system
    $systememail="admin@gmail.com";
    $systempassword="password12345";

    if($useremail==$systememail && $userpassword==$systempassword){
        // login account
        $_SESSION['usermail']="admin@gmail.com";
        $_SESSION['userpassword']="password12345";
        // When correct email and password,url will reach to list.php
        header('location: users/list.php');
    }else{
        $_SESSION['incorrectmsg']="Invalid username or password.";
        header('location: login.php');
    }
}
?>