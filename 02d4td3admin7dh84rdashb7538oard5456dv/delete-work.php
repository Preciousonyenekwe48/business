<?php

include 'includes/dbconfig.php';

//echo "delete page";
  if(isset($_GET['id']) && isset($_GET['wallpaper']) && isset($_GET['website_video']) && isset($_GET['mobile1_website_image']) && isset($_GET['mobile2_website_image']) && isset($_GET['mobile_website_video']) && isset($_GET['tablet_website_video'])
  && isset($_GET['tablet_website_section_video']))
  {
    //Process to Delete
    //echo "Process to Delete";

    //1. Get ID and Image name
    $id = $_GET['id'];
    $wallpaper = $_GET['wallpaper'];
    $website_video = $_GET['website_video'];
    $mobile1_website_image = $_GET['mobile1_website_image'];
    $mobile2_website_image = $_GET['mobile2_website_image'];
    $mobile_website_video = $_GET['mobile_website_video'];
    $tablet_website_video = $_GET['tablet_website_video'];
    $tablet_website_section_video = $_GET['tablet_website_section_video'];

    //2. Remove the image if available
    //check whether the image is available or not and delete
    if($wallpaper != "")
    {
      // it has image
      //get the image path
      $path = "../portfolio/media/".$wallpaper;

      //Remove image file from folder
      $remove = unlink($path);

      //check whether the image is removed or not
      if($remove==false)
      {
        //failed to remove image
        header("Location: works.php?remove_success=false");
        //Stop the process
        die();
      }
    }

    //3. Delete food from database
    $sql = "DELETE FROM work_table WHERE id=$id";
    //Execute the query
    $res = mysqli_query($conn, $sql);

    //check whether the query executed or not
    //4. Redirect to admin_food page
    if($res==true)
    {
      header("Location: works.php?remove_success=true");
    }
    else
    {
      //failed to delete food
      header("Location: works.php?remove_success=false");
    }
  }
  else
  {
    //Redirect to manage food page
    //echo "Redirect";
    header("Location: works.php?remove_success=false");
  }

?>
