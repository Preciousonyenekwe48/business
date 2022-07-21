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
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $coc = mysqli_real_escape_string($conn, $_POST['coc']);
    $vat = mysqli_real_escape_string($conn, $_POST['vat']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    $whatsapp = mysqli_real_escape_string($conn, $_POST['whatsapp']);
    $dribble = mysqli_real_escape_string($conn, $_POST['dribble']);
    $linkedin = mysqli_real_escape_string($conn, $_POST['linkedin']);
    $current_image_name = $_POST['current_image_name'];

    //2. Updating new image if selected
    //Check whether the image is selected or not
    if(isset($_FILES['image_name']['name']))
    {
      //Get the details of the selected image
      $image_name = $_FILES['image_name']['name'];

      //check whether the image is selected or not
      if($image_name!="")
      {
        //Image is selected
        //. Rename the image
        //Get the extenstion of selected image
        $ext = end(explode('.', $image_name));

        //create new name for image
        $image_name = "Profile_Contact_Image".rand(0000,9999).'.'.$ext;

        //. Upload the image
        //Get the src path and destination path

        //source path is the current location of the image
        $src=$_FILES['image_name']['tmp_name'];

        //destination path for the image to upload
        $dst = "../portfolio/assets/img/".$image_name;

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
        if($current_image_name!="")
        {
          $remove_path = "../portfolio/assets/img/".$current_image_name;

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
        $image_name = $current_image_name;
      }
    }
    else
    {
      $image_name = $current_image_name;
    }


    //3. Update the database
    $sql3 = "UPDATE contact_table SET
            image_name = '$image_name',
            email = '$email',
            phone_number = '$phone_number',
            coc = '$coc',
            vat = '$vat',
            location = '$location',
            website = '$website',
            instagram = '$instagram',
            whatsapp = '$whatsapp',
            dribble = '$dribble',
            linkedin = '$linkedin'
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
                <h1 class="h3 mb-4 text-gray-800">Edit Contact Information</h1>
                <span class="h6 mb-4 text-gray-800">All your uploads combined together shouldn't be greater than 7mb</span>

                <form action="" method="post" enctype="multipart/form-data">
                    <?php echo $msg;

                    $sql1 = "SELECT * FROM contact_table WHERE id='$id'";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        while ($row1 = mysqli_fetch_assoc($result1)) {

                    ?>
                    <div class="form-group">
                        <label for="email">Your Contact Email Address</label>
                        <input type="text" class="form-control" value="<?php echo $row1['email']; ?>" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Your Phone Number</label>
                        <input type="text" class="form-control" value="<?php echo $row1['phone_number']; ?>" name="phone_number" id="phone_number" required>
                    </div>
                    <div class="form-group">
                        <label for="coc">Your Certificate of Conformity(CoC)</label>
                        <input type="text" class="form-control" value="<?php echo $row1['coc']; ?>" name="coc" id="coc" required>
                    </div>
                    <div class="form-group">
                        <label for="vat">Value-added Tax(VAT)</label>
                        <input type="text" class="form-control" name="vat" id="vat" <?php echo $row1['vat']; ?> required>
                    </div>
                    <div class="form-group">
                        <label for="location">Your Present Working Location</label>
                        <input type="text" class="form-control" name="location" id="location" <?php echo $row1['location']; ?> required>
                    </div>
                    <div class="form-group">
                        <label for="website">Your Website Account Url Link</label>
                        <input type="text" value="<?php echo $row1['website']; ?>" disabled>
                        <input type="url" class="form-control" name="website" id="website" <?php echo $row1['website']; ?> required>
                    </div>
                    <div class="form-group">
                        <label for="instagram">Your Instagram Account Url Link</label>
                        <input type="text" value="<?php echo $row1['instagram']; ?>" disabled>
                        <input type="url" class="form-control" name="instagram" id="instagram" <?php echo $row1['instagram']; ?> required>
                    </div>
                    <div class="form-group">
                        <label for="whatsapp">Your Whatsapp Account Url Link</label>
                        <input type="text" value="<?php echo $row1['whatsapp']; ?>" disabled>
                        <input type="url" class="form-control" name="whatsapp" id="whatsapp" <?php echo $row1['whatsapp']; ?> required>
                    </div>
                    <div class="form-group">
                        <label for="dribble">Your Dribble Account Url Link</label>
                        <input type="text" value="<?php echo $row1['dribble']; ?>" disabled>
                        <input type="url" class="form-control" name="dribble" id="dribble" <?php echo $row1['dribble']; ?> required>
                    </div>
                    <div class="form-group">
                        <label for="linkedin">Your Linkedin Account Url Link</label>
                        <input type="text" value="<?php echo $row1['linkedin']; ?>" disabled>
                        <input type="url" class="form-control" name="linkedin" id="linkedin" <?php echo $row1['linkedin']; ?> required>
                    </div>
                    <div class="form-group">
                      <label><h2>Uploading Section</h2> Please Follow all Procedure, When Uploading it might take a little mins. <br>Don't go out from page until the uploading process is done. </label>
                      <div class="form-group">
                          <label for="image_name">Profile Picture <span style="color: red;">(not bigger than 5mb)</span></label>
                          <input type="hidden" class="form-control" name="current_image_name" value="<?php echo $row1['image_name']; ?>">
                          <input type="file" class="form-control" name="image_name" id="image_name" accept="image/jpeg, image/tiff, image/gif, image/png" value="<?php echo $row1['image_name']; ?>">
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
