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
    $short_heading = mysqli_real_escape_string($conn, $_POST['short_heading']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $joined = mysqli_real_escape_string($conn, $_POST['joined']);
    $medium_heading = mysqli_real_escape_string($conn, $_POST['medium_heading']);
    $design = mysqli_real_escape_string($conn, $_POST['design']);
    $development = mysqli_real_escape_string($conn, $_POST['development']);
    $complete_package = mysqli_real_escape_string($conn, $_POST['complete_package']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $current_image = $_POST['current_image'];
    $current_talk = $_POST['current_talk'];

    //2. Updating new image if selected
    //Check whether the image is selected or not
    if(isset($_FILES['image']['name']))
    {
      //Get the details of the selected image
      $image = $_FILES['image']['name'];

      //check whether the image is selected or not
      if($image!="")
      {
        //Image is selected
        //. Rename the image
        //Get the extenstion of selected image
        $ext = end(explode('.', $image));

        //create new name for image
        $image = "About_Image_".rand(0000,9999).'.'.$ext;

        //. Upload the image
        //Get the src path and destination path

        //source path is the current location of the image
        $src=$_FILES['image']['tmp_name'];

        //destination path for the image to upload
        $dst = "../portfolio/assets/img/".$image;

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
        if($current_image!="")
        {
          $remove_path = "../portfolio/media/".$current_image;

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
        $image = $current_image;
      }
    }
    else
    {
      $image = $current_image;
    }


    //2. Updating new image if selected
    //Check whether the image is selected or not
    if(isset($_FILES['talk']['name']))
    {
      //Get the details of the selected image
      $talk = $_FILES['talk']['name'];

      //check whether the image is selected or not
      if($talk!="")
      {
        //Image is selected
        //. Rename the image
        //Get the extenstion of selected image
        $ext = end(explode('.', $talk));

        //create new name for image
        $talk = "AboutImage_".rand(0000,9999).'.'.$ext;

        //. Upload the image
        //Get the src path and destination path

        //source path is the current location of the image
        $src=$_FILES['talk']['tmp_name'];

        //destination path for the image to upload
        $dst = "../portfolio/assets/img/".$talk;

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
        if($current_talk!="")
        {
          $remove_path = "../portfolio/assets/img/".$current_talk;

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
        $talk = $current_talk;
      }
    }
    else
    {
      $talk = $current_talk;
    }

    //3. Update the database
    $sql3 = "UPDATE about_table SET
            short_heading = '$short_heading',
            medium_heading = '$medium_heading',
            design = '$design',
            development = '$development',
            complete_package = '$complete_package',
            image = '$image',
            talk = '$talk',
            company = '$company',
            joined = '$joined',
            description = '$description'
            WHERE id = $id
    ";

    //Execute the Query
    $res3 = mysqli_query($conn, $sql3);

    //4. Redirect to admin category with message
    //Check whether query execute or not
    if($res3==true)
    {
      //Category Updated
      $msg = "<div class='alert alert-success'>About updated successful.</div>";
    }
    else
    {
      //Failed to Updated Category
      //Category Updated
    $msg = "<div class='alert alert-danger'>About Failed to update.</div>";
    }
  }


?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-8 col-12 mx-auto bg-white p-4 shadow">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Edit About</h1>
                <span class="h6 mb-4 text-gray-800">All your uploads combined together shouldn't be greater than 7mb</span>

                <form action="" method="post" enctype="multipart/form-data">
                    <?php echo $msg;

                    $sql1 = "SELECT * FROM about_table WHERE id='$id'";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        while ($row1 = mysqli_fetch_assoc($result1)) {

                    ?>
                    <div class="form-group">
                        <label for="short_heading">Write a Short Heading</label>
                        <input type="text" class="form-control" value="<?php echo $row1['short_heading']; ?>" name="short_heading" id="short_heading" required>
                    </div>
                    <div class="form-group">
                        <label for="medium_heading">What your Offer to the World<span style="color: red;">(Not more than 60words)</span></label>
                        <textarea type="text" class="form-control" value="" name="medium_heading" id="medium_heading" rows="4" cols="10" style="resize: none;" required><?php echo $row1['medium_heading']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="design">Write about your designs projects <span style="color: red;">(Not more than 80words)</span></label>
                        <textarea type="text" class="form-control" value="" name="design" id="design" rows="4" cols="10" style="resize: none;" required><?php echo $row1['design']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="development">Write about your development projects <span style="color: red;">(Not More Than 100words)</span></label>
                        <textarea type="text" class="form-control" name="development" id="development" rows="8" cols="30" style="resize: none;" required><?php echo $row1['development']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="complete_package">Write about giving clients a complete projects <span style="color: red;">(Not More Than 70words)</span></label>
                        <textarea type="text" class="form-control" name="complete_package" id="complete_package" rows="8" cols="30" style="resize: none;" required><?php echo $row1['complete_package']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="company">Company You're Working for <span style="color: blue;">(if non please write your brand name)</span></label>
                        <input type="text" class="form-control" value="<?php echo $row1['company']; ?>" name="company" id="company" required>
                    </div>
                    <div class="form-group">
                        <label for="joined">Your Company and Date you Joined</label>
                        <input type="text" class="form-control" value="<?php echo $row1['joined']; ?>" name="joined" id="joined" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Write about your company and when your joined <span style="color: red;">(Not More Than 80words)</span></label>
                        <textarea type="text" class="form-control" name="description" id="description" rows="8" cols="30" style="resize: none;" required><?php echo $row1['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label><h2>Uploading Section</h2> Please Follow all Procedure, When Uploading it might take a little mins. <br>Don't go out from page until the uploading process is done. </label>
                      <div class="form-group">
                          <label for="image">Full Body Image of You (not bigger than 2mb)</label>
                          <input type="hidden" class="form-control" name="current_image" value="<?php echo $row1['image']; ?>">
                          <input type="file" class="form-control" name="image" id="image" accept="image/jpeg, image/tiff, image/gif, image/png" value="<?php echo $row1['image']; ?>">
                      </div>
                      <div class="form-group">
                          <label for="talk">Image of You In a Meeting (not bigger than 2mb)</label>
                          <input type="hidden" class="form-control" name="current_talk" value="<?php echo $row1['talk']; ?>">
                          <input type="file" class="form-control" name="talk" id="talk" accept="image/jpeg, image/tiff, image/gif, image/png" value="<?php echo $row1['talk']; ?>">
                      </div>
                    </div>
                    <?php } } ?>
                    <button type="submit" name="submit" class="btn btn-primary">Update About</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'includes/footer.php'; ?>
