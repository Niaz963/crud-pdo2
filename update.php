
<?php

include("db.php");


if(isset($_GET['update'])){
  $stdid = $_GET['update'];
  $query = "SELECT * FROM student WHERE id={$stdid}";
  $get_statement = $pdo->prepare( $query);
  $get_statement->execute();
  $result = $get_statement->fetchAll();


foreach ($result as $value) {
    

      $stdid = $value['id'];
      $stdname = $value['std_name'];
      $stdreg = $value['std_reg'];

  } 

}




if(isset($_POST['update_btn'])){
  $stdname = $_POST['stdname'];
  $stdreg = $_POST['stdreg'];

 if(!empty($stdname) && !empty($stdreg)){
  $query = "UPDATE student SET std_name='$stdname', std_reg=$stdreg WHERE id='$stdid'";
  $updatequery = $pdo->prepare($query);
  $updatequery->execute();
  // header("location:display.php");
 
  if($updatequery){
      echo "Data Updated Successfully";
  }
 }else{
     echo "Filed Should not be empty";
 }
}


  

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
    


    <div class="container m-5 p-3">

        <button class="btn btn-primary my-5">
                <a href="display.php" class="text-light text-decoration-none ">Show Data</a>
        </button>


        <form action="" method="post" class="d-flex justify-content-around">
        
        

            <input class="form-control" type="text" name="stdname" value="<?php echo $stdname; ?>">
            <input class="form-control" type="number" name="stdreg" value="<?php echo $stdreg; ?>">
            <!-- <input type="text" name="uid" value="<?php echo  $stdid ?>" hidden> -->
            <input type="submit" value="Update" name="update_btn" class="btn btn-primary">


          


        </form>
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
