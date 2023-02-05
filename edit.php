<?php
    include 'function.php';
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $select=$pdo->prepare("SELECT * FROM crud WHERE id=$id");
        $select->execute();
        $row=$select->fetch(PDO::FETCH_OBJ);
        // $username=$row->username;
        // $email=$row->email;
        // print_r($row);
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>CRUD Operation</title>
  </head>
  <body>
        <div class="container m-5">
            <form action="update.php" method="post">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $row->username;?>">
                </div>
                <div class="mb-3">
                    <input type="text" name="email" class="form-control" placeholder="email" value="<?php echo $row->email;?>">
                </div>
                <div class="mb-3">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id;?>">
                </div>
                <input type="submit" class="btn btn-primary" name="edit"  value="Save">
            </form>
            <br>
            <button class="btn btn-primary" onclick="myDelete()">Delete</button>
        </div>
        
<script>
    function myDelete(){
        if(confirm("Are you sure to Delete?!")){
            // console.log('true')
            window.location.replace('delete.php?delete="1"&id="<?=$row->id?>"')
        }
    }
</script>
  </body>
</html>