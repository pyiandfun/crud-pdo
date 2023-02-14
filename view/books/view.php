<?php
  include ('../../controller/books/function.php');
  include 'update.php';

    //check user login or not
    if(!isset($_SESSION['usermail']) && !isset($_SESSION['userpassword'])) {

        header("location: ../login.php");

    }

    //call data with id
    if(isset($_REQUEST['id'])) {

        $id = $_REQUEST['id'];
        $select=$pdo->prepare("SELECT * FROM books WHERE id=$id");
        $select->execute();
        $row=$select->fetch(PDO::FETCH_OBJ);

        // $username=$row->username;
        // $email=$row->email;
        // $price=$row->price;
        // print_r($price);
    } 

//edit form
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>CRUD Operation</title>
  </head>
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
                                <a class="nav-link active" aria-current="page" href="../users/list.php">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="list.php">Books</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="container">
        <a href="list.php"><i class="fa-solid fa-reply w-10 h-10"></i></a>
        </div>

        <div class="container m-5" style="height: 360px;">

            <form action="update.php" method="post" id="form">
                <div class="mb-3">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id;?>">
                </div>
                <div class="mb-3">
                    <input type="text" name="bookname" class="form-control" placeholder="bookname" value="<?php echo $row->bookname;?>">
                </div>
                <div class="mb-3">
                    <input type="text" name="author" class="form-control" placeholder="author" value="<?php echo $row->author;?>">
                </div>
                <div class="mb-3">
                    <input type="number" min="0" name="price" class="form-control" placeholder="price" value="<?php echo $row->price;?>">
                </div>
            </form>

            <button class="btn btn-secondary" name="update" form="form">Update</button>
            <button class="btn btn-secondary" onclick="myDelete()">Delete</button>
            
        </div>

        <footer class="bg-secondary">
            <div class="text-center py-2 text-light">&copy; all right reserved.</div>
        </footer>


        <!-- yes or cancle confirm -->
        <script>
            function myDelete(){
                if(confirm("Are you sure to Delete?!")){
                    // console.log('true')
                    window.location.replace('../../controller/books/delete.php?delete="1"&id="<?=$row->id?>"')
                }
            }
        </script>

    </body>
</html>