<?php

include 'includes/dbconfig.php';

//echo "delete page";
  if(isset($_GET['id']) && isset($_GET['img']))
  {
    //Process to Delete
    //echo "Process to Delete";

    //1. Get ID and Image name
    $id = $_GET['id'];
    $img = $_GET['img'];

    //2. Remove the image if available
    //check whether the image is available or not and delete
    if($img != "")
    {
      // it has image
      //get the image path
      $path = "../upload/".$img;

      //Remove image file from folder
      $remove = unlink($path);

      //check whether the image is removed or not
      if($remove==false)
      {
        //failed to remove image
        $_SESSION['remove_success'] = "<div class='error_message'>Failed to Remove Image File</div>";
        //Redirect
        header('location:'.SITEURL.'comments.php');
        //Stop the process
        die();
      }
    }
    //3. Delete food from database
    $sql = "DELETE FROM comments WHERE id=$id";
    //Execute the query
    $res = mysqli_query($conn, $sql);

    //check whether the query executed or not
    //4. Redirect to admin_food page
    if($res==true)
    {
      //food deleted
      $_SESSION['remove_success'] = "<div class='success_message'>Video Deleted Successfully</div>";
      header('location:'.SITEURL.'comments.php');
    }
    else
    {
      //failed to delete food
      $_SESSION['remove_success'] = "<div class='error_message'>Failed to Delete Video.</div>";
      header('location:'.SITEURL.'comments.php');
    }
  }
  else
  {
    //Redirect to manage food page
    //echo "Redirect";
    $_SESSION['remove_success'] = "<div class='error_message'>Unauthorized Access</div>";
    header('location:'.SITEURL.'comments.php');
  }

 ?>
