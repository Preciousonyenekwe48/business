<?php

include 'includes/header.php';

$id = $_GET['id'];

$msg = "";

if (isset($_POST['submit'])) {
    $cat_name = mysqli_real_escape_string($conn, $_POST['cat_name']);
    $cat_order = mysqli_real_escape_string($conn, $_POST['cat_order']);

    $sql = "UPDATE category_table SET cat_title='$cat_title', cat_order='$cat_order', services='$services', year='$year' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = "<div class='alert alert-success'>Category has been successfully updated.</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Something wrong went. Please try again.</div>";
    }
}

?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-8 col-12 mx-auto bg-white p-4 shadow">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Edit Category</h1>

                <form action="" method="post">
                    <?php echo $msg;

                    $sql = "SELECT * FROM category_table WHERE id='$id'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <div class="form-group">
                        <label for="name">Category Title</label>
                        <input type="text" class="form-control" name="cat_title" id="name" value="<?php echo $row['cat_title']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="order">Category Order</label>
                        <input type="number" class="form-control" name="cat_order" value="<?php echo $row['cat_order']; ?>" id="order" required>
                    </div>
                    <div class="form-group">
                        <label for="service">Services Offered</label>
                        <input type="text" class="form-control" name="services" value="<?php echo $row['services']; ?>" id="service" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Year Of Production/Development</label>
                        <input type="year" class="form-control" name="year" value="<?php echo $row['year']; ?>" id="year" required>
                    </div>
                    <?php } } ?>
                    <button type="submit" name="submit" class="btn btn-primary">Update Category</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'includes/footer.php'; ?>
