
<?php


include("db.php");

if(isset($_GET['delSucc'])){
    echo "Deleted Successfully";
}


// insert data start
if(isset($_POST['btn'])){
    $stdname = $_POST['stdname'];
    $stdreg = $_POST['stdreg'];

    if(!empty($stdname) && !empty($stdreg)){
        $query ="INSERT INTO student(std_name,std_reg) VALUE('$stdname',$stdreg)";

        $createquery = $pdo->prepare($query);

        $createquery->execute();


        if($createquery){
            echo "Your Data Submit Successfuly";
        }
    }else{
        echo "Field should not be empty";
    }
}

//end insert data

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD</title>
  </head>
  <body>





    
    <div class="container">

        <button class="btn btn-primary my-5">
            <a href="index.php" class="text-light text-decoration-none ">Add user</a>
        </button>
  
        <table class="table table-bordered">
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Reg</th>
                <th></th>
                <th></th>
            </tr>

            <?php
                $query ="SELECT * FROM student";
                $readquery = $pdo->prepare($query);
                $readquery->execute();
                $result = $readquery->fetchAll();
                
                if($readquery->rowCount() >0){
                    foreach ($result as $value) {
                        $stdid = $value['id'];
                        $stdname = $value['std_name'];
                        $stdreg = $value['std_reg'];
                
            ?>

            <tr>
                <td><?php echo $stdid;?></td>
                <td><?php echo $stdname;?></td>
                <td><?php echo $stdreg;?></td>
                <td><a href="update.php?update=<?php echo $stdid;?>" class="btn btn-info">Update</a></td>
                <td><a href="delete.php?delete=<?php echo $stdid;?>" class="btn btn-danger">Delete</a></td>
            </tr>

            <?php

              }   
               }else{
                 echo "No Data to show";
             }        

            ?>

        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>