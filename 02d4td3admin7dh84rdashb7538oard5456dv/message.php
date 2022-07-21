<?php include 'includes/header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Messages</h1>

    <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
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
                        <th>Phone Number</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Name Of Client Organisation/Company</th>
                        <th>Services Client Need Your To Offer</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT * FROM message_table";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $id = 1;
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $row['tel']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['name_of_org']; ?></td>
                        <td><?php echo $row['service_your_look']; ?></td>
                        <td><?php echo $row['message']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td>
                            <a href="delete-message.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
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
