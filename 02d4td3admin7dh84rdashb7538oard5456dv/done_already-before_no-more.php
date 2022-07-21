<?php

include 'includes/dbconfig.php'; // Include database configuration file


$msg = "";

error_reporting(0);

if (isset($_POST['submit'])) { // Check register button is clicked or not
    // Define some variables
    $user_name = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'images/'.$image;

    if ($password == $cpassword) { // Check password is match or not
        $sql = "SELECT username, email FROM account WHERE username='$user_name' AND email='$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $msg = "<div class='alert alert-danger'>Username or Email is already exists.</div>";
        } elseif($image_size > 500010){
         //create a session variable to display message
         $msg['error'] = "<div class='alert alert-danger'>Image Size Is To Large</div>";
         //Redirect Page to add admin manager(add-admin)
         header('Location: register.php');
       } else {
            $insertSql = "INSERT INTO account (username, email, image, password, role) VALUES ('$user_name', '$email', '$image', '$password', '0')";
            $insertResult = mysqli_query($conn, $insertSql);
            if ($insertResult) {
                move_uploaded_file($image_tmp_name, $image_folder);
                $msg = "<div class='alert alert-success'>Your registration is completed. Now you can login.</div>";
                $_POST['username'] = "";
                $_POST['email'] = "";
                $_POST['image'] = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                $msg = "<div class='alert alert-danger'>Your registration is not completed. Please try again.</div>";
            }
        }

    } else {
        $msg = "<div class='alert alert-danger'>Password not matched. Please try again.</div>";
    }
}

?>

<html lang="en">
<head>
    <?php include '../includes/head.php'; ?>
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-5 col-12 mx-auto">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php echo $msg; ?>
                    <h2>Register Here</h2>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Enter your Username" value="<?php echo $_POST['username']; ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="email" placeholder="Enter your Email" value="<?php echo $_POST['email']; ?>" required>
                    </div>
                    <div class="input-group mb-3" style="display: inline-block;">
                      <h5>Please Enter A Standard Profile Picture (not more than 5mb)</h5>
                      <div class="input-group mb-3">
                        <input type="file" class="form-control" name="image" placeholder="Enter your Profile image" value="<?php echo $_POST['image']; ?>" required>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Enter your Password" value="<?php echo $_POST['password']; ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" value="<?php echo $_POST['cpassword']; ?>" required>
                    </div>
                    <div class="input-group">
                        <button type="submit" name="submit" class="btn btn-primary" style="background: blue;">Register</button>
                    </div>
                    <p class="mt-3">Do you have already an account? <a href="login.php" style="color: blue;">Login Here</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
