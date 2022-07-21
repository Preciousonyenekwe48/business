<?php

include 'includes/dbconfig.php';

//echo "delete page";
  if(isset($_GET['id']))
  {
    //Process to Delete
    //echo "Process to Delete";

    //1. Get ID and Image name
    $id = $_GET['id'];


    //3. Delete food from database
    $sql = "DELETE FROM category_table WHERE id=$id";
    //Execute the query
    $res = mysqli_query($conn, $sql);

    //check whether the query executed or not
    //4. Redirect to admin_food page
    if($res==true)
    {
      //food deleted
      header("Location: categories.php?remove_success=true");
    }
    else
    {
      //failed to delete food
      header("Location: categories.php?remove_success=false");
    }
  }
  else
  {
    //Redirect to manage food page
    //echo "Redirect";
    header("Location: categories.php?remove_success=false");
  }

 ?>
