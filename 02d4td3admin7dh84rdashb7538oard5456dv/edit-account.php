<?php

include 'includes/header.php';
//1. Get the ID of Selected Admin
$id=$_GET['id'];

$msg = "";

error_reporting(0);

//2. Create SQL Query to Get the Details
$sql = "SELECT * FROM account WHERE id=$id";

//Execute the Query
$res = mysqli_query($conn, $sql);

//Check whether the query is executed or not
if($res==TRUE)
{
  //Check whether the data is available or not
  $count = mysqli_num_rows($res);
  //Check whether we have admin data or not
  if($count==1)
  {
    // Get the Details
    //echo "Admin Available";
    $row=mysqli_fetch_assoc($res);

    $id = $row['id'];
    $username = $row['username'];
    $email = $row['email'];
    $image = $row['image'];
    $password = $row['password'];
  }
  else
  {
    //redirect to manage admin page
    header('location:'.SITEURL.'settings.php');
  }
}

 ?>


 <?php

 if(isset($_POST['update'])){

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $update_username = mysqli_real_escape_string($conn, $_POST['update_username']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

    mysqli_query($conn, "UPDATE `account` SET username = '$update_username', email = '$update_email' WHERE id = '$id'") or die('query failed');

    $current_image = $_POST['current_image'];

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
        $image = "Images_".rand(0000,9999).'.'.$ext;

        //. Upload the image
        //Get the src path and destination path

        //source path is the current location of the image
        $src=$_FILES['image']['tmp_name'];

        //destination path for the image to upload
        $dst = "images/".$image;

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
          $remove_path = "images/".$current_image;

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

    //3. Update the database
    $sql3 = "UPDATE account SET
            image = '$image'
            WHERE id = $id
    ";

    //Execute the Query
    $res3 = mysqli_query($conn, $sql3);

    //4. Redirect to admin category with message
    //Check whether query execute or not
    if($res3==true)
    {
      //Category Updated
      $msg = "<div class='alert alert-success'>Image updated successful.</div>";
    }
    else
    {
      //Failed to Updated Category
      //Category Updated
    $msg = "<div class='alert alert-danger'>Image Failed to update.</div>";
    }

    $current_password = mysqli_real_escape_string($conn, md5($_POST['current_password']));
    $new_password = mysqli_real_escape_string($conn, md5($_POST['new_password']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm_password']));

    //2. Check whether the user with current ID and Current Exists or not
         $sql = "SELECT * FROM account WHERE id = $id AND password = '$current_password'";

         //Execute the Query
         $res = mysqli_query($conn, $sql);

         if($res==true)
         {
           //Check whether data is available or not
           $count=mysqli_num_rows($res);

           if($count==1)
           {
             //User Exists and Password can be Changed
             //echo "User Found";
             //Check whether the new password and confirm password match or not
             if($new_password==$confirm_password)
             {
               //update the Password
               $sql2 = "UPDATE account SET
                         password='$new_password'
                         WHERE id=$id
                       ";

                       //Execute the Query
                       $res2 = mysqli_query($conn, $sql2);

                       //check whether the query is executed or not
                       if($res2==true)
                       {
                         //Display Success Message
                         //Redirect to admin manager page with the success message
                         $msg = "<div class='alert alert-success'>Password Changed Successfully.</div>";
                       }
                       else
                       {
                         //Display Error Message
                         //Redirect to admin manager page with the error message
                         $msg = "<div class='alert alert-danger'>Failed to Change Password.</div>";

                       }
             }
             else
             {
               //Redirect to admin manager page with the error message
               $msg = "<div class='alert alert-danger'>Password did not match.</div>";
             }
           }
           else
           {
             //User Does not Exist Set Message and redirect
             $msg = "<div class='alert alert-danger'>User Not Found.</div>";
           }
         }

 }

 ?>



    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-8 col-12 mx-auto bg-white p-4 shadow">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Edit Account</h1>
                <span class="h6 mb-4 text-gray-800">All your uploads combined together shouldn't be greater than 7mb</span>

                <form action="" method="post" enctype="multipart/form-data">
                    <?php echo $msg;
                    if(isset($message)){
                      foreach($message as $message){
                        echo '<div class="message">'.$message.'</div>';
                          }}
                    $sql1 = "SELECT * FROM account WHERE id='$id'";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        while ($row1 = mysqli_fetch_assoc($result1)) {

                    ?>
                    <div class="form-group">
                        <label for="username">Your Admin Username</label>
                        <input type="text" class="form-control" value="<?php echo $row1['username']; ?>" name="update_username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Login Email</label>
                        <input type="text" class="form-control" value="<?php echo $row1['email']; ?>" name="update_email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="update_pass">Please Enter Your Previous Password</label>
                        <input type="password" class="form-control" value="" name="current_password" id="email" >
                    </div>
                    <div class="form-group">
                        <label for="new_pass">Please Enter Your New Password Here!...</label>
                        <input type="password" class="form-control" value="" name="new_password" id="new_pass" >
                    </div>
                    <div class="form-group">
                        <label for="confirm_pass">Please Re-Enter Your New Password Here!...</label>
                        <input type="password" class="form-control" value="" name="confirm_password" id="confirm_pass" >
                    </div>
                    <div class="form-group">
                      <label><h2>Uploading Section</h2> Please Follow all Procedure, When Uploading it might take a little mins. <br>Don't go out from page until the uploading process is done. </label>
                      <div class="form-group">
                          <label for="image">Wallpaper Image (not bigger than 5mb)</label>
                          <input type="hidden" class="form-control" name="current_image" value="<?php echo $row1['image']; ?>">
                          <input type="file" class="form-control" name="image" id="image" accept="image/jpeg, image/tiff, image/gif, image/png" value="<?php echo $row1['image']; ?>">
                      </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $row1['id']; ?>">
                    <?php } } ?>
                    <button type="submit" name="update" class="btn btn-primary">Update Account</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'includes/footer.php'; ?>
