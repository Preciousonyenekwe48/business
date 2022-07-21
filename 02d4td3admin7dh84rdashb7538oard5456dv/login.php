<?php

include 'includes/dbconfig.php'; // Include database configuration file

error_reporting(0);

$msg = "";

if (isset($_POST['submit'])) {
    $user_name = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    $sql = "SELECT * FROM account WHERE username='$user_name' OR email='$user_name'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['password'] == $password) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            header("Location: index.php");
        } else {
            $msg = "<div class='alert alert-danger'>Password is incorrect. Please try again.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>Username or Email is incorrect. Please try again.</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../includes/head.php'; ?>
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-5 col-12 mx-auto">
                <form action="" method="POST">
                    <?php echo $msg; ?>
                    <h2>Login Here</h2>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Enter your Username or Email" value="<?php echo $_POST['username']; ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Enter your Password" value="<?php echo $_POST['password']; ?>" required>
                    </div>
                    <div class="input-group">
                        <button type="submit" name="submit" class="btn btn-primary" style="background: blue;">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
