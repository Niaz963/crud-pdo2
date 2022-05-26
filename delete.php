<?php

include("db.php");

// start data deleted




if(isset($_GET['delete'])){
    $stdid = $_GET['delete'];
    $query ="DELETE FROM student WHERE id='$stdid'";
    $deletequery = $pdo->prepare($query);
    $deletequery->execute();
    // header("location:index.php?delSucc=1");

    if($deletequery){
        
        header("location:display.php?delSucc=1");
        
        }else{
            echo "Data not deleted";
        }
    

    

  
    
    // if($deletequery){
    //     echo "Data Deleted Successfully";
    // }
}


//end data deleted




?>