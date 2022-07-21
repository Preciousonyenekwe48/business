<?php

include 'includes/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "<script>window.location.replace('settings.php');</script>";
}

$msg = "";

error_reporting(0);

if(isset($_POST['submit']))
  {
    //check if the button is clicked
    //echo "clicked";
    //1. Get all the value from form
    $Location = mysqli_real_escape_string($conn, $_POST['Location']);
    $specialised_in = mysqli_real_escape_string($conn, $_POST['specialised_in']);
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $slogan = mysqli_real_escape_string($conn, $_POST['slogan']);
    $style_slogan = mysqli_real_escape_string($conn, $_POST['style_slogan']);

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
        $dst = "../portfolio/assets/img/".$wallpaper;

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
          $remove_path = "../portfolio/assets/img/".$current_wallpaper;

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


    //3. Update the database
    $sql3 = "UPDATE portfolio_table SET
            Location = '$Location',
            specialised_in = '$specialised_in',
            wallpaper = '$wallpaper',
            full_name = '$full_name',
            slogan = '$slogan',
            style_slogan = '$style_slogan',
            wallpaper = '$wallpaper'
            WHERE id = $id
    ";

    //Execute the Query
    $res3 = mysqli_query($conn, $sql3);

    //4. Redirect to admin category with message
    //Check whether query execute or not
    if($res3==true)
    {
      //Category Updated
      $msg = "<div class='alert alert-success'>Portfolio updated successful.</div>";
    }
    else
    {
      //Failed to Updated Category
      //Category Updated
    $msg = "<div class='alert alert-danger'>Portfolio Failed to update.</div>";
    }
  }


?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-8 col-12 mx-auto bg-white p-4 shadow">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Edit Portfolio</h1>
                <span class="h6 mb-4 text-gray-800">All your uploads combined together shouldn't be greater than 7mb</span>

                <form action="" method="post" enctype="multipart/form-data">
                    <?php echo $msg;

                    $sql1 = "SELECT * FROM portfolio_table WHERE id='$id'";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        while ($row1 = mysqli_fetch_assoc($result1)) {

                    ?>
                    <div class="form-group">
                        <label for="Location">Your Residence Country</label>
                        <input type="text" class="form-control" value="<?php echo $row1['Location']; ?>" name="Location" id="Location" required>
                    </div>
                    <div class="form-group">
                        <label for="specialised_in">What are your specialised In <span style="color: red;">(Not More Than 30words)</span></label>
                        <input type="text" class="form-control" value="<?php echo $row1['specialised_in']; ?>" name="specialised_in" id="specialised_in" required>
                    </div>
                    <div class="form-group">
                        <label for="full_name">Your Full Name</label>
                        <input type="text" class="form-control" value="<?php echo $row1['full_name']; ?>" name="full_name" id="full_name" required>
                    </div>
                    <div class="form-group">
                        <label for="slogan">Slogan <span style="color: red;">(Not More Than 100words)</span></label>
                        <textarea type="text" class="form-control" name="slogan" id="slogan" rows="8" cols="80" style="resize: none;"><?php echo $row1['slogan']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="style_slogan">Sub Slogan <span style="color: red;">(Not More Than 50words)</span></label>
                        <textarea type="text" class="form-control" name="style_slogan" id="style_slogan" rows="8" cols="80" style="resize: none;"><?php echo $row1['style_slogan']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label><h2>Uploading Section</h2> Please Follow all Procedure, When Uploading it might take a little mins. <br>Don't go out from page until the uploading process is done. </label>
                      <div class="form-group">
                          <label for="wallpaper">Profile Picture Wallpaper Image (not bigger than 5mb)</label>
                          <input type="hidden" class="form-control" name="current_wallpaper" value="<?php echo $row1['wallpaper']; ?>">
                          <input type="file" class="form-control" name="wallpaper" id="wallpaper" accept="image/jpeg, image/tiff, image/gif, image/png" value="<?php echo $row1['wallpaper']; ?>">
                      </div>
                    </div>
                    <?php } } ?>
                    <button type="submit" name="submit" class="btn btn-primary">Update Portfolio</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'includes/footer.php'; ?>
