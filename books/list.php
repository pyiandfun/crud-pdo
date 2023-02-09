<?php

  include ('function.php');
  include('update.php');

  if(!isset($_SESSION['usermail']) && !isset($_SESSION['userpassword'])){
    header("location: ../login.php");
  }

  $previous = "javascript:history.go(-1)";
  if(isset($_SERVER['HTTP_REFERER'])) {
      $previous = $_SERVER['HTTP_REFERER'];
  }


  define('PER_PAGE',5);

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM books");
    $stmt->execute();
    $entries_count = $stmt->fetchColumn();
    $totalPages = ceil($entries_count / PER_PAGE);

    $pagenow=isset($_GET["page"])? $_GET["page"] : 2;
    $limit=($pagenow-1) * PER_PAGE;
    $offset = PER_PAGE;

    $stmt=$pdo->prepare("SELECT * FROM books ORDER BY id LIMIT $limit,$offset");
    $stmt->execute();
    $users=$stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD operation with pdo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-light">
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
                        <a class="nav-link" href="#">Books</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </header>
    <div class="container d-flex d-flex justify-content-between py-3">
      <button type="submit" class="btn btn-secondary"><a href="index.php" class="text-light">Add Books+</a></button>
      <button type="submit" onclick=myLogout() class="btn btn-secondary" name="logout"><a href="../logout.php" class="text-light">logout</a></button>
    </div>
    <div class="container">
      <a href="<?= $previous ?>"><i class="fa-solid fa-reply w-10 h-10"></i></a>
    </div>
    <h5 class="container text-center">You can view the list of books.</h5>
    <div class="text-center text-primary">

<?php

  if(!empty($_SESSION) && isset($_SESSION['updatemsg'])) {

    echo $_SESSION['updatemsg'];
    unset($_SESSION['updatemsg']);

  }


  if(!empty($_SESSION) && isset($_SESSION['deletemsg'])){

    echo $_SESSION['deletemsg'];
    unset($_SESSION['deletemsg']);

  }
?>

    </div>
    <table class="table table-striped mx-auto my-5 w-75">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Book's Name</th>
          <th scope="col">Author</th>
          <th scope="col">Price</th>
          <th scope="col">View Detail</th>
        </tr>
      </thead>
    <tbody>

    <tr>
            
<?php
foreach($users as $user){

    echo    
            '<td>'.$user['id'].'</td>'.
            '<td>'.$user['bookname'].'</td>'.
            '<td>'.$user['author'].'</td>'.
            '<td>'.$user['price'].'</td>'.
            '<td><button class="btn btn-secondary" type="submit" name="edit">
                    <a href="view.php?id='.$user['id'].'" class="text-light">View</a>
                  </button>
            </td>';
          
        
?>          
        </tr>
      </tbody>

      <?php } ?>

    </table>

    <div class="text-center m-3">

    <?php
   

    for($page=1; $page<=$totalPages; $page++){
?>
        <a class="text-center text-light bg-secondary p-2" href='list.php?page=<?php echo $page; ?>'><?php echo $page; ?></a>
<?php
    }
?>
</div>
  <footer class="bg-secondary">
    <div class="text-center py-2 text-light">&copy; all right reserved.</div>
  </footer>

  <script>

        function myLogout() {
            if(confirm("Are you sure to Logout?!")){

                // console.log('true')
                window.location.replace('logout.php')

            }
        }
  </script>
</body>
</html>