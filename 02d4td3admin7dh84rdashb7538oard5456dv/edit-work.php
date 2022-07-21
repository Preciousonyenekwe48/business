<?php

include 'includes/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "<script>window.location.replace('works.php');</script>";
}

$msg = "";

error_reporting(0);

if(isset($_POST['submit']))
  {
    //check if the button is clicked
    //echo "clicked";
    //1. Get all the value from form
    $work_title = mysqli_real_escape_string($conn, $_POST['work_title']);
    $website_link = mysqli_real_escape_string($conn, $_POST['website_link']);
    $roles_services = mysqli_real_escape_string($conn, $_POST['roles_services']);
    $credits_design = mysqli_real_escape_string($conn, $_POST['credits_design']);
    $credits_copy = mysqli_real_escape_string($conn, $_POST['credits_copy']);
    $location_year = mysqli_real_escape_string($conn, $_POST['location_year']);
    $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
    $date = date("d M, Y");
    $current_wallpaper = mysqli_real_escape_string($conn, $_POST['current_wallpaper']);
    $current_website_video = mysqli_real_escape_string($conn, $_POST['current_website_video']);
    $current_mobile1_website_image = mysqli_real_escape_string($conn, $_POST['current_mobile1_website_image']);
    $current_mobile2_website_image = mysqli_real_escape_string($conn, $_POST['current_mobile2_website_image']);
    $current_mobile_website_video = mysqli_real_escape_string($conn, $_POST['current_mobile_website_video']);
    $current_tablet_website_video = mysqli_real_escape_string($conn, $_POST['current_tablet_website_video']);
    $current_tablet_website_section_video = mysqli_real_escape_string($conn, $_POST['current_tablet_website_section_video']);

    //2. Updating new image if selected
    //Check whether the image is selected or not
    if(isset($_FILES['wallpaper']['name']))
    {
      //Get the details of the selected image
      $wallpaper = $_FILES['wallpaper']['name'];

      //check whether the image is selected or not
      if($wallpaper!="")
      {
        //Image is selected
        //. Rename the image
        //Get the extenstion of selected image
        $ext = end(explode('.', $wallpaper));

        //create new name for image
        $wallpaper = "Wallpaper_".rand(0000,9999).'.'.$ext;

        //. Upload the image
        //Get the src path and destination path

        //source path is the current location of the image
        $src=$_FILES['wallpaper']['tmp_name'];

        //destination path for the image to upload
        $dst = "../portfolio/media/".$wallpaper;

        //upload the food image
        $upload = move_uploaded_file($src, $dst);

        //check whether image uploaded or not
        if($upload==false)
        {
          //failed to upload the image
          //redirect to admin_food page
          $msg = "<div class='alert alert-danger'>Image is Unable to upload.</div>";
          //stop the process
          die();
        }
        //remove the current image if availbe
        if($current_wallpaper!="")
        {
          $remove_path = "../portfolio/media/".$current_wallpaper;

          $remove = unlink($remove_path);

          //check whether the image is removed or not
          //if failed to remove then display message and stop the process
          if($remove==false)
          {
            //Failed to remove image
            $msg = "<div class='alert alert-danger'>Failed to remove current image.</div>";
            //Stop the Process
            die();
         }
        }
      }
      else
      {
        $wallpaper = $current_wallpaper;
      }
    }
    else
    {
      $wallpaper = $current_wallpaper;
    }

    //3. Updating new image if selected
    //Check whether the image is selected or not
    if(isset($_FILES['website_video']['name']))
    {
      //Get the details of the selected image
      $website_video = $_FILES['website_video']['name'];

      //check whether the image is selected or not
      if($website_video!="")
      {
        //Image is selected
        //. Rename the image
        //Get the extenstion of selected image
        $ext = end(explode('.', $website_video));

        //create new name for image
        $website_video = "Website_Video_".rand(0000,9999).'.'.$ext;

        //. Upload the image
        //Get the src path and destination path

        //source path is the current location of the image
        $src=$_FILES['website_video']['tmp_name'];

        //destination path for the image to upload
        $dst = "../portfolio/media/".$website_video;

        //upload the food image
        $upload = move_uploaded_file($src, $dst);

        //check whether image uploaded or not
        if($upload==false)
        {
          //failed to upload the image
          //redirect to admin_food page
          $msg = "<div class='alert alert-danger'>Desktop Website Video is Unable to upload.</div>";
          //stop the process
          die();
        }
        //remove the current image if availbe
        if($current_website_video!="")
        {
          $remove_path = "../portfolio/media/".$current_website_video;

          $remove = unlink($remove_path);

          //check whether the image is removed or not
          //if failed to remove then display message and stop the process
          if($remove==false)
          {
            //Failed to remove image
            $msg = "<div class='alert alert-danger'>Failed to remove current desktop website video.</div>";
            //Stop the Process
            die();
         }
        }
      }
      else
      {
        $website_video = $current_website_video;
      }
    }
    else
    {
      $website_video = $current_website_video;
    }

    //2. Updating new image if selected
    //Check whether the image is selected or not
    if(isset($_FILES['mobile1_website_image']['name']))
    {
      //Get the details of the selected image
      $mobile1_website_image = $_FILES['mobile1_website_image']['name'];

      //check whether the image is selected or not
      if($mobile1_website_image!="")
      {
        //Image is selected
        //. Rename the image
        //Get the extenstion of selected image
        $ext = end(explode('.', $mobile1_website_image));

        //create new name for image
        $mobile1_website_image = "Mobile1_image_".rand(0000,9999).'.'.$ext;

        //. Upload the image
        //Get the src path and destination path

        //source path is the current location of the image
        $src=$_FILES['mobile1_website_image']['tmp_name'];

        //destination path for the image to upload
        $dst = "../portfolio/media/".$mobile1_website_image;

        //upload the food image
        $upload = move_uploaded_file($src, $dst);

        //check whether image uploaded or not
        if($upload==false)
        {
          //failed to upload the image
          //redirect to admin_food page
          $msg = "<div class='alert alert-danger'>1st Mobile image is Unable to upload.</div>";
          //stop the process
          die();
        }
        //remove the current image if availbe
        if($current_mobile1_website_image!="")
        {
          $remove_path = "../portfolio/media/".$current_mobile1_website_image;

          $remove = unlink($remove_path);

          //check whether the image is removed or not
          //if failed to remove then display message and stop the process
          if($remove==false)
          {
            //Failed to remove image
            $msg = "<div class='alert alert-danger'>Failed to remove current 1st mobile image.</div>";
            //Stop the Process
            die();
         }
        }
      }
      else
      {
        $mobile1_website_image = $current_mobile1_website_image;
      }
    }
    else
    {
      $mobile1_website_image = $current_mobile1_website_image;
    }

    //2. Updating new image if selected
    //Check whether the image is selected or not
    if(isset($_FILES['mobile2_website_image']['name']))
    {
      //Get the details of the selected image
      $mobile2_website_image = $_FILES['mobile2_website_image']['name'];

      //check whether the image is selected or not
      if($mobile2_website_image!="")
      {
        //Image is selected
        //. Rename the image
        //Get the extenstion of selected image
        $ext = end(explode('.', $mobile2_website_image));

        //create new name for image
        $mobile2_website_image = "Mobile2_image_".rand(0000,9999).'.'.$ext;

        //. Upload the image
        //Get the src path and destination path

        //source path is the current location of the image
        $src=$_FILES['mobile2_website_image']['tmp_name'];

        //destination path for the image to upload
        $dst = "../portfolio/media/".$mobile2_website_image;

        //upload the food image
        $upload = move_uploaded_file($src, $dst);

        //check whether image uploaded or not
        if($upload==false)
        {
          //failed to upload the image
          //redirect to admin_food page
          $msg = "<div class='alert alert-danger'>2nd Mobile Image is Unable to upload.</div>";
          //stop the process
          die();
        }
        //remove the current image if availbe
        if($current_mobile2_website_image!="")
        {
          $remove_path = "../portfolio/media/".$current_mobile2_website_image;

          $remove = unlink($remove_path);

          //check whether the image is removed or not
          //if failed to remove then display message and stop the process
          if($remove==false)
          {
            //Failed to remove image
            $msg = "<div class='alert alert-danger'>Failed to remove current 2nd mobile image.</div>";
            //Stop the Process
            die();
         }
        }
      }
      else
      {
        $mobile2_website_image = $current_mobile2_website_image;
      }
    }
    else
    {
      $mobile2_website_image = $current_mobile2_website_image;
    }

    //2. Updating new image if selected
    //Check whether the image is selected or not
    if(isset($_FILES['mobile_website_video']['name']))
    {
      //Get the details of the selected image
      $mobile_website_video = $_FILES['mobile_website_video']['name'];

      //check whether the image is selected or not
      if($mobile_website_video!="")
      {
        //Image is selected
        //. Rename the image
        //Get the extenstion of selected image
        $ext = end(explode('.', $mobile_website_video));

        //create new name for image
        $mobile_website_video = "Mobile_video_".rand(0000,9999).'.'.$ext;

        //. Upload the image
        //Get the src path and destination path

        //source path is the current location of the image
        $src=$_FILES['mobile_website_video']['tmp_name'];

        //destination path for the image to upload
        $dst = "../portfolio/media/".$mobile_website_video;

        //upload the food image
        $upload = move_uploaded_file($src, $dst);

        //check whether image uploaded or not
        if($upload==false)
        {
          //failed to upload the image
          //redirect to admin_food page
          $msg = "<div class='alert alert-danger'>Mobile video is Unable to upload.</div>";
          //stop the process
          die();
        }
        //remove the current image if availbe
        if($current_mobile_website_video!="")
        {
          $remove_path = "../portfolio/media/".$current_mobile_website_video;

          $remove = unlink($remove_path);

          //check whether the image is removed or not
          //if failed to remove then display message and stop the process
          if($remove==false)
          {
            //Failed to remove image
            $msg = "<div class='alert alert-danger'>Failed to remove current Mobile video.</div>";
            //Stop the Process
            die();
         }
        }
      }
      else
      {
        $mobile_website_video = $current_mobile_website_video;
      }
    }
    else
    {
      $mobile_website_video = $current_mobile_website_video;
    }

    //2. Updating new image if selected
    //Check whether the image is selected or not
    if(isset($_FILES['tablet_website_video']['name']))
    {
      //Get the details of the selected image
      $tablet_website_video = $_FILES['tablet_website_video']['name'];

      //check whether the image is selected or not
      if($tablet_website_video!="")
      {
        //Image is selected
        //. Rename the image
        //Get the extenstion of selected image
        $ext = end(explode('.', $tablet_website_video));

        //create new name for image
        $tablet_website_video = "Mobile_video_".rand(0000,9999).'.'.$ext;

        //. Upload the image
        //Get the src path and destination path

        //source path is the current location of the image
        $src=$_FILES['tablet_website_video']['tmp_name'];

        //destination path for the image to upload
        $dst = "../portfolio/media/".$tablet_website_video;

        //upload the food image
        $upload = move_uploaded_file($src, $dst);

        //check whether image uploaded or not
        if($upload==false)
        {
          //failed to upload the image
          //redirect to admin_food page
          $msg = "<div class='alert alert-danger'>Mobile video is Unable to upload.</div>";
          //stop the process
          die();
        }
        //remove the current image if availbe
        if($current_tablet_website_video!="")
        {
          $remove_path = "../portfolio/media/".$current_tablet_website_video;

          $remove = unlink($remove_path);

          //check whether the image is removed or not
          //if failed to remove then display message and stop the process
          if($remove==false)
          {
            //Failed to remove image
            $msg = "<div class='alert alert-danger'>Failed to remove current Mobile video.</div>";
            //Stop the Process
            die();
         }
        }
      }
      else
      {
        $tablet_website_video = $current_tablet_website_video;
      }
    }
    else
    {
      $tablet_website_video = $current_tablet_website_video;
    }

    //2. Updating new image if selected
    //Check whether the image is selected or not
    if(isset($_FILES['tablet_website_section_video']['name']))
    {
      //Get the details of the selected image
      $tablet_website_section_video = $_FILES['tablet_website_section_video']['name'];

      //check whether the image is selected or not
      if($tablet_website_section_video!="")
      {
        //Image is selected
        //. Rename the image
        //Get the extenstion of selected image
        $ext = end(explode('.', $tablet_website_section_video));

        //create new name for image
        $tablet_website_section_video = "Tablet_section_video_".rand(0000,9999).'.'.$ext;

        //. Upload the image
        //Get the src path and destination path

        //source path is the current location of the image
        $src=$_FILES['tablet_website_section_video']['tmp_name'];

        //destination path for the image to upload
        $dst = "../portfolio/media/".$tablet_website_section_video;

        //upload the food image
        $upload = move_uploaded_file($src, $dst);

        //check whether image uploaded or not
        if($upload==false)
        {
          //failed to upload the image
          //redirect to admin_food page
          $msg = "<div class='alert alert-danger'>Tablet Section Video is Unable to upload.</div>";
          //stop the process
          die();
        }
        //remove the current image if availbe
        if($current_tablet_website_section_video!="")
        {
          $remove_path = "../portfolio/media/".$current_tablet_website_section_video;

          $remove = unlink($remove_path);

          //check whether the image is removed or not
          //if failed to remove then display message and stop the process
          if($remove==false)
          {
            //Failed to remove image
            $msg = "<div class='alert alert-danger'>Failed to remove current Tablet Section Video.</div>";
            //Stop the Process
            die();
         }
        }
      }
      else
      {
        $tablet_website_section_video = $current_tablet_website_section_video;
      }
    }
    else
    {
      $tablet_website_section_video = $current_tablet_website_section_video;
    }



    //3. Update the database
    $sql3 = "UPDATE work_table SET
            work_title = '$work_title',
            website_link = '$website_link',
            roles_services = '$roles_services',
            credits_design = '$credits_design',
            credits_copy = '$credits_copy',
            location_year = '$location_year',
            wallpaper = '$wallpaper',
            website_video = '$website_video',
            mobile1_website_image = '$mobile1_website_image',
            mobile2_website_image = '$mobile2_website_image',
            mobile_website_video = '$mobile_website_video',
            tablet_website_video = '$tablet_website_video',
            tablet_website_section_video = '$tablet_website_section_video',
            cat_id = '$cat_id',
            date = '$date'
            WHERE id = $id
    ";

    //Execute the Query
    $res3 = mysqli_query($conn, $sql3);

    //4. Redirect to admin category with message
    //Check whether query execute or not
    if($res3==true)
    {
      //Category Updated
      $msg = "<div class='alert alert-success'>Work updated successful.</div>";
    }
    else
    {
      //Failed to Updated Category
      //Category Updated
    $msg = "<div class='alert alert-danger'>Work Failed to update.</div>";
    }
  }


?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-8 col-12 mx-auto bg-white p-4 shadow">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Edit Work</h1>
                <span class="h6 mb-4 text-gray-800">All your uploads combined together shouldn't be greater than 7mb</span>

                <form action="" method="post" enctype="multipart/form-data">
                    <?php echo $msg;

                    $sql1 = "SELECT * FROM work_table WHERE id='$id'";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        while ($row1 = mysqli_fetch_assoc($result1)) {

                    ?>
                    <div class="form-group">
                        <label for="work_title">Project Title</label>
                        <input type="text" class="form-control" value="<?php echo $row1['work_title']; ?>" name="work_title" id="work_title" required>
                    </div>
                    <div class="form-group">
                        <label for="website_link">Project Website Link</label>
                        <input type="url" class="form-control" value="<?php echo $row1['website_link']; ?>" name="website_link" id="website_link" required>
                    </div>
                    <div class="form-group">
                        <label for="roles_services">Roles and Services</label>
                        <input type="text" class="form-control" value="<?php echo $row1['roles_services']; ?>" name="roles_services" id="roles_services" required>
                    </div>
                    <div class="form-group">
                        <label for="credits_design">Credit to the Company that design the website</label>
                        <input type="text" class="form-control" value="<?php echo $row1['credits_design']; ?>" name="credits_design" id="credits_design" >
                    </div>
                    <div class="form-group">
                        <label for="credits_copy">Credit to the builder (his or her full name)</label>
                        <input type="text" class="form-control" value="<?php echo $row1['credits_copy']; ?>" name="credits_copy" id="credits_copy" >
                    </div>
                    <div class="form-group">
                        <label for="location_year">The Project Companys Location and the year it was built</label>
                        <input type="text" class="form-control" value="<?php echo $row1['location_year']; ?>" name="location_year" id="location_year" >
                    </div>
                    <div class="form-group">
                      <label><h2>Uploading Section</h2> Please Follow all Procedure, When Uploading it might take a little mins. <br>Don't go out from page until the uploading process is done. </label>
                      <div class="form-group">
                          <label for="wallpaper">Wallpaper Image (not bigger than 5mb)</label>
                          <input type="hidden" class="form-control" name="current_wallpaper" value="<?php echo $row1['wallpaper']; ?>">
                          <input type="file" class="form-control" name="wallpaper" id="wallpaper" accept="image/jpeg, image/tiff, image/gif, image/png" value="<?php echo $row1['wallpaper']; ?>">
                      </div>
                      <div class="form-group">
                          <label for="website_video">10secs video of Desktop view of the website(x6)</label>
                          <input type="hidden" class="form-control" name="current_website_video" value="<?php echo $row1['website_video']; ?>">
                          <input type="file" class="form-control" name="website_video" id="website_video" accept="video/mp4, video/avi" value="<?php echo $row1['website_video']; ?>">
                      </div>
                      <div class="form-group">
                          <label for="mobile1_website_image">Mobile Image of the website</label>
                          <input type="hidden" class="form-control" name="current_mobile1_website_image" value="<?php echo $row1['mobile1_website_image']; ?>">
                          <input type="file" class="form-control" name="mobile1_website_image" id="mobile1_website_image"  accept="image/jpeg, image/tiff, image/gif, image/png" value="<?php echo $row1['mobile1_website_image']; ?>">
                      </div>
                      <div class="form-group">
                          <label for="mobile2_website_image">Mobile Image of the website from a different section</label>
                          <input type="hidden" class="form-control" name="current_mobile2_website_image"  value="<?php echo $row1['mobile2_website_image']; ?>">
                          <input type="file" class="form-control" name="mobile2_website_image" id="mobile2_website_image"  accept="image/jpeg, image/tiff, image/gif, image/png" value="<?php echo $row1['mobile2_website_image']; ?>">
                      </div>
                      <div class="form-group">
                          <label for="mobile_website_video">2secs video of Mobile view of the website(X16)</label>
                          <input type="hidden" class="form-control" name="current_mobile_website_video" value="<?php echo $row1['mobile_website_video']; ?>">
                          <input type="file" class="form-control" name="mobile_website_video" id="mobile_website_video" accept="video/mp4, video/avi" value="<?php echo $row1['mobile_website_video']; ?>">
                      </div>
                      <div class="form-group">
                          <label for="tablet_website_video">20secs video of Tablet view of the website(x6)</label>
                          <input type="hidden" class="form-control" name="current_tablet_website_video" value="<?php echo $row1['tablet_website_video']; ?>">
                          <input type="file" class="form-control" name="tablet_website_video" id="tablet_website_video" accept="video/mp4, video/avi" value="<?php echo $row1['tablet_website_video']; ?>">
                      </div>
                      <div class="form-group">
                          <label for="tablet_website_section_video">10secs video of Tablet view of the Website(X8), <br> from a different section</label>
                          <input type="hidden" class="form-control" name="current_tablet_website_section_video" value="<?php echo $row1['tablet_website_section_video']; ?>">
                          <input type="file" class="form-control" name="tablet_website_section_video" id="tablet_website_section_video" accept="video/mp4, video/avi" value="<?php echo $row1['tablet_website_section_video']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="cat_id" required>
                            <option value="" selected hidden disabled>Select Category</option>
                            <?php

                            $sql = "SELECT * FROM category_table";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                            <option <?php if ($row1['cat_id'] == $row['cat_title']) { echo "selected"; } ?> value="<?php echo $row['cat_title']; ?>"><?php echo $row['cat_title']; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <?php } } ?>
                    <button type="submit" name="submit" class="btn btn-primary">Update Work</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'includes/footer.php'; ?>
