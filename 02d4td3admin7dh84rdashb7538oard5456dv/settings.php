<?php include 'includes/header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Portfolio</h1>

    <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3" style="display: flex; justify-content: space-between;">
        <h6 class="m-0 font-weight-bold text-primary">Portfolio</h6>
        <?php

        $sql = "SELECT * FROM portfolio_table";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

        ?>
        <a href="edit-portfolio.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
        <?php

          }}

        ?>
    </div>
    <div class="card-body">
        <?php

        if (isset($_GET['remove_success'])) {
            if ($_GET['remove_success'] == "true") {
                echo "<div class='alert alert-success'>Record deleted successful.</div>";
            } else {
                echo "<div class='alert alert-danger'>Record can't deleted.</div>";
            }
        }

        ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Profile Image</th>
                        <th>Country</th>
                        <th>Specialized In</th>
                        <th>Full Name</th>
                        <th>Slogan</th>
                        <th>Style Slogan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT * FROM portfolio_table";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $id = 1;
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <tr>
                        <td><?php echo $id; ?>.</td>
                        <td><img src="<?php if (file_exists("../portfolio/assets/img/" . $row['wallpaper'])) { echo "../portfolio/assets/img/" . $row['wallpaper']; }?>" alt="" class="img-fluid" style="width: 30%;"></td>
                        <td><?php echo $row['Location']; ?></td>
                        <td><?php echo $row['specialised_in']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['slogan']; ?></td>
                        <td><?php echo $row['style_slogan']; ?></td>
                    </tr>
                    <?php

                        $id++; }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Account</h1>

    <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3" style="display: flex; justify-content: space-between;">
        <h6 class="m-0 font-weight-bold text-primary">Account</h6>
        <?php

        $sql = "SELECT * FROM account";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

        ?>
        <a href="edit-account.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
        <?php

          }}

        ?>
    </div>
    <div class="card-body">
        <?php

        if (isset($_GET['remove_success'])) {
            if ($_GET['remove_success'] == "true") {
                echo "<div class='alert alert-success'>Record deleted successful.</div>";
            } else {
                echo "<div class='alert alert-danger'>Record can't deleted.</div>";
            }
        }

        ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Profile Image</th>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT * FROM account";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $id = 1;
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <tr>
                        <td><?php echo $id; ?>.</td>
                        <td><img src="<?php if (file_exists("images/" . $row['image'])) { echo "images/" . $row['image']; }?>" alt="" class="img-fluid" style="width: 10%;"></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <?php

                        $id++; }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">About</h1>

    <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3" style="display: flex; justify-content: space-between;">
        <h6 class="m-0 font-weight-bold text-primary">About</h6>
        <?php

        $sql = "SELECT * FROM about_table";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $id = 1;
            while ($row = mysqli_fetch_assoc($result)) {

        ?>
        <a href="edit-about.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
        <?php

          }}

        ?>
    </div>
    <div class="card-body">
        <?php

        if (isset($_GET['remove_success'])) {
            if ($_GET['remove_success'] == "true") {
                echo "<div class='alert alert-success'>Record deleted successful.</div>";
            } else {
                echo "<div class='alert alert-danger'>Record can't deleted.</div>";
            }
        }

        ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Full Body Image</th>
                        <th>Discussion Image</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT * FROM about_table";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $id = 1;
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <tr>
                        <td><?php echo $id; ?>.</td>
                        <td><img src="<?php if (file_exists("../portfolio/assets/img/" . $row['image'])) { echo "../portfolio/assets/img/" . $row['image']; }?>" alt="" class="img-fluid" style="width: 30%;"></td>
                        <td><img src="<?php if (file_exists("../portfolio/assets/img/" . $row['talk'])) { echo "../portfolio/assets/img/" . $row['talk']; }?>" alt="" class="img-fluid" style="width: 30%;"></td>
                        <td><?php echo $row['description']; ?></td>
                    </tr>
                    <?php

                        $id++; }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Contact</h1>

    <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3" style="display: flex; justify-content: space-between;">
        <h6 class="m-0 font-weight-bold text-primary">Contact</h6>
        <?php

        $sql = "SELECT * FROM contact_table";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $id = 1;
            while ($row = mysqli_fetch_assoc($result)) {

        ?>
        <a href="edit-contact.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
        <?php

          }}

        ?>
    </div>
    <div class="card-body">
        <?php

        if (isset($_GET['remove_success'])) {
            if ($_GET['remove_success'] == "true") {
                echo "<div class='alert alert-success'>Record deleted successful.</div>";
            } else {
                echo "<div class='alert alert-danger'>Record can't deleted.</div>";
            }
        }

        ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Profile Image</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Website</th>
                        <th>Country</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT * FROM contact_table";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $id = 1;
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <tr>
                        <td><?php echo $id; ?>.</td>
                        <td><img src="<?php if (file_exists("../portfolio/assets/img/" . $row['image_name'])) { echo "../portfolio/assets/img/" . $row['image_name']; }?>" alt="" class="img-fluid" style="width: 30%;"></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone_number']; ?></td>
                        <td><?php echo $row['website']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                    </tr>
                    <?php

                        $id++; }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include 'includes/footer.php'; ?>
