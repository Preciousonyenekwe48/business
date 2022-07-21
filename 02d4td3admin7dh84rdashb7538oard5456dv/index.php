<?php include 'includes/header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Category -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Categories </div>
                                <?php
                        					//sql query
                        						$sql2 = "SELECT * FROM category_table";
                        						//execute query
                        						$res2 = mysqli_query($conn, $sql2);
                        						//Count Rows
                        						$count2 = mysqli_num_rows($res2);
                        					 ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count2; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Works Accomplished -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Works Accomplished</div>
                                <?php
                        					//sql query
                        						$sql3 = "SELECT * FROM work_table";
                        						//execute query
                        						$res3 = mysqli_query($conn, $sql3);
                        						//Count Rows
                        						$count3 = mysqli_num_rows($res3);
                        					 ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count3; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Archive -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Archive
                            </div>
                            <?php
                              //sql query
                                $sql4 = "SELECT * FROM archive_table";
                                //execute query
                                $res4 = mysqli_query($conn, $sql4);
                                //Count Rows
                                $count4 = mysqli_num_rows($res4);
                               ?>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $count4; ?></div>
                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-lock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Messages</div>
                                <?php
                        					//sql query
                        						$sql5 = "SELECT * FROM message_table";
                        						//execute query
                        						$res5 = mysqli_query($conn, $sql5);
                        						//Count Rows
                        						$count5 = mysqli_num_rows($res5);
                        					 ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count5; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-20 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">New Messages</h6>
                    <div class="dropdown no-arrow">

                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
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
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php

                                  $sql = "SELECT * FROM message_table ORDER BY id DESC";
                                  $result = mysqli_query($conn, $sql);
                                  if (mysqli_num_rows($result) > 0) {
                                      $id = 1;
                                      while ($row = mysqli_fetch_assoc($result)) {

                                  ?>
                                  <tr>
                                      <td><?php echo $id; ?>.</td>
                                      <td><?php echo $row['tel']; ?></td>
                                      <td><?php echo $row['full_name']; ?></td>
                                      <td><?php echo $row['email']; ?></td>
                                      <td><?php echo $row['name_of_org']; ?></td>
                                      <td><?php echo $row['service_your_look']; ?></td>
                                      <td><?php echo $row['message']; ?></td>
                                      <td><?php echo $row['date']; ?></td>
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
        </div>


    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include 'includes/footer.php'; ?>
