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
    $sql = "DELETE FROM message_table WHERE id=$id";
    //Execute the query
    $res = mysqli_query($conn, $sql);

    //check whether the query executed or not
    //4. Redirect to admin_food page
    if($res==true)
    {
      //food deleted
      $msg = "<div class='alert alert-danger'>Message Deleted Successfully.</div>";
      header('location:'.SITEURL.'message.php');
    }
    else
    {
      //failed to delete food
      $msg = "<div class='alert alert-danger'>Failed to Delete Message.</div>";
      header('location:'.SITEURL.'message.php');
    }
  }
  else
  {
    //Redirect to manage food page
    //echo "Redirect";
    $msg = "<div class='alert alert-danger'>Unauthorized Access.</div>";
    header('location:'.SITEURL.'message.php');
  }

 ?>
