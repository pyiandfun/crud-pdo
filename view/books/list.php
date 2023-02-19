<?php

  include ('../../controller/books/function.php');
  include('update.php');

  // session_start();
  if(!isset($_SESSION['usermail']) && !isset($_SESSION['userpassword'])) {



    header("location: ../login.php");

  }

  $previous = "javascript:history.go(-1)";

  if(isset($_SERVER['HTTP_REFERER'])) {

      $previous = $_SERVER['HTTP_REFERER'];

  }

  define('PER_PAGE',5);

      $stmt =$pdo->prepare("SELECT COUNT(*) FROM books");
      $stmt->execute();
      $entries_count = $stmt->fetchColumn();
      $totalPages = ceil($entries_count / PER_PAGE);


      // if (isset($_GET['page']) && is_numeric($_GET['page'])) {
      //   $page = $_GET['page'];
      // } else {
      //   $page = 1;  // Default to the first page
      // }

      $pagenow=isset($_GET["page"])? $_GET["page"] : 1;
      $limit=($pagenow-1) * PER_PAGE;
      $offset = PER_PAGE;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD operation with pdo - update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

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
                <ul class="pagination navbar-nav">
                    <li class="page-item nav-item">
                        <a class="page-link nav-link" aria-current="page" href="../../view/users/list.php">Users</a>
                    </li>
                    <li class="page-item nav-item">
                        <a class="page-link nav-link active"aria-current="page" href="#">Books</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </header>
    <div class="container d-flex flex-row justify-content-end py-3">
      <button type="submit" onclick=myLogout() class="btn btn-secondary" name="logout"><a href="../../controller/logout.php" class="text-light">logout</a></button>
    </div>
    <div class="container">
      <div class="d-flex flex-row justify-content-between">
        <form action="" method="post">
          <div class="search d-flex flex-row">
            <input type="text" name="keyword" id="search_text" class="form-control form-control-sm w-100 rounded-0 border-primary" placeholder="Search.....">
            <button class="btn btn-secondary m-1" type="submit" name="search">Search</button>
          </div>
        </form>

        <div><button class="btn btn-primary"><a href="add.php" class="text-light
">Add New Books+</a></button></div>
        
        <!-- Sorting data -->

        <?php

$bookname = $author = $price = '';
if($_GET>'' && isset($_GET['sortOrder'])) {
  $sortOrder = $_GET['sortOrder'];

  switch($sortOrder) {
    case 'id':
      $user_id = 'selected';
    case 'bookname':
      $bookname= 'selected';
      break;
    case 'author':
      $author = 'selected';
      break;
      case 'price':
        $price = 'selected';
        break; 
    default:
    $user_id = 'selected';
  }
}


$asc_direction=$desc_direction='';
if($_GET && isset($_GET['sortDirection'])) {
  $sortDirection = $_GET['sortDirection'];

  switch($sortDirection){
    case 'ASC':
      $asc_direction = 'selected';
      break;
    case 'DESC':
      $desc_direction = 'selected';
      break;
    default:
      $asc_direction = 'selected';
  }

}

?>
        <form method="get">
          <label for="sortOrder">Sort by:</label>
            <select name="sortOrder" id="sortOrder">
              <option value="bookname" <?php echo ($bookname)?$bookname:'';?>>bookname</option>
              <option value="author" <?php echo ($author)?$author:'';?>>author</option>
            </select>
          <label for="sortDirection">Sort direction:</label>
            <select name="sortDirection" id="sortDirection">
              <option value="ASC" <?php echo ($asc_direction)?$asc_direction:'';?>>Ascending</option>
              <option value="DESC" <?php echo ($desc_direction)?$desc_direction:'';?>>Descending</option>
            </select>
          <input type="hidden" name="page" name="page" value="1">
          <input type="submit" name="sort" value="Sort">
        </form>
      </div>
    </div>

  <h5 class="container text-center">You can view the list of users.</h5>
  <div class="text-center text-danger">
      
<?php

      if(!empty($_SESSION) && isset($_SESSION['updatemsg'])) {

        echo $_SESSION['updatemsg'];
        unset($_SESSION['updatemsg']);

      }

        if(!empty($_SESSION) && isset($_SESSION['deletemsg'])) {

          echo $_SESSION['deletemsg'];
          unset($_SESSION['deletemsg']);

      }

      $previous = "javascript:history.go(-1)";
      if(isset($_SERVER['HTTP_REFERER'])) {

        $previous = $_SERVER['HTTP_REFERER'];

      }
?>
  </div>
            
<?php
if(isset($_POST['search'])) {

  $keyword=$_POST['keyword'];

  $query = $pdo->prepare("SELECT * FROM books WHERE bookname LIKE :keyword OR author LIKE :keyword OR price LIKE :keyword");
  $query->bindParam(":keyword", $keyword);
  $query->execute();

  echo '<table class="table table-striped mx-auto my-5 w-75">';
  echo "<tr><th>id</th><th>Bookname</th><th>Author</th><th>Price</th><th>View</th></tr>";

  while($row=$query->fetch()){
      ?><tr><?php
      echo
        '<td>'.$row['id'].'</td>'.
        '<td>'.$row['bookname'].'</td>'.
        '<td>'.$row['author'].'</td>'.
        '<td>'.$row['price'].'</td>'.
        '<td>
          <button class="btn btn-secondary" type="submit" name="edit">
              <a href="view.php?id='.$row['id'].'" class="text-light">View</a>
          </button>
        </td>'; 
        echo "</tr>";
      }
    echo "</table>";
    
      } else if($_GET && isset($_GET['sort'])) {

      $sortOrder = $_GET['sortOrder'];
      $sortDirection = $_GET['sortDirection'];

      $stmt = $pdo->prepare("SELECT * FROM books ORDER BY $sortOrder $sortDirection LIMIT $limit,$offset");

      $stmt->execute();

      $books = $stmt->fetchAll();

      echo '<table class="table table-striped mx-auto my-5 w-75">';
      echo "<tr><th>id</th><th>Bookname</th><th>Author</th><th>Price</th><th>View</th></tr>";
      
      foreach ($books as $book) {
      echo "<tr>";
      echo "<td>" . $book['id'] . "</td>";
      echo "<td>" . $book['bookname'] . "</td>";
      echo "<td>" . $book['author'] . "</td>";
      echo "<td>" . $book['price'] . "</td>";
      echo '<td>
        <button class="btn btn-secondary" type="submit" name="edit">
          <a href="view.php?id='.$book['id'].'" class="text-light">View</a>
        </button>
      </td>'; 
      echo "</tr>";
    }
    echo "</table>";

    }
    else{

      $stmt=$pdo->prepare("SELECT * FROM books ORDER BY id LIMIT $limit,$offset");
      $stmt->execute();

      $books=$stmt->fetchAll();

      echo '<table class="table table-striped mx-auto my-5 w-75">';
      echo "<tr><th>id</th><th>Book Name</th><th>Author</th><th>Price</th><th>View</th></tr>";

    foreach($books as $book){
    
    ?><tr><?php

    echo    
      '<td>'.$book['id'].'</td>'.
      '<td>'.$book['bookname'].'</td>'.
      '<td>'.$book['author'].'</td>'.
      '<td>'.$book['price'].'</td>'.
      '<td><button class="btn btn-secondary" type="submit" name="edit">
            <a href="view.php?id='.$book['id'].'" class="text-light">View</a>
          </button>
      </td>';
      
      echo "</tr>";
    }
  echo "</table>";


?>          

<?php } ?>

    <div class="text-center m-3 d-flex justify-content-center">
    <ul class="pagination">

  <?php for ($page=1; $page<=$totalPages; $page++) { ?>
        <li class="page-item">
          <a class="page-link text-center m-1 p-2 <?php echo (!isset($_GET) && !$_GET['page'])?"active":((isset($_GET['page']) && $_GET['page'] == $page)?"active":"");?>" href='list.php?sortOrder=<?php echo isset($sortOrder)?$sortOrder:'id';?>&sortDirection=<?php echo isset($sortDirection)?$sortDirection:'ASC';?>&sort=Sort&&page=<?php echo $page ;?>'><?php echo '<span>'.$page . '</span>'; ?></a>
        </li>

  <?php } ?>

    </ul>
  </div>
  <footer class="bg-secondary">
    <div class="text-center py-2 text-light">&copy; all right reserved.</div>
  </footer>

  <script>
        function myLogout(){
            if(confirm("Are you sure to Logout?!")){
                // console.log('true')
                window.location.replace('../../controller/logout.php')
            }
        }

  </script>

</body>
</html>