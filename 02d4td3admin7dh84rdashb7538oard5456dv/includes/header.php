<?php

include 'dbconfig.php';


if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}

?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="This is created with html, css, javascript, php, mysql, ajax">
    <meta name="author" content="precious obumneme onyenekwe">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../images/favicon.png" type="image/png" />
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">

    <title>Portfolio - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Port<sup>folio</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="categories.php" data-toggle="collapse" data-target="#categories"
                    aria-expanded="true" aria-controls="categories">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Categories</span>
                </a>
                <div id="categories" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Categories:</h6>
                        <a class="collapse-item" href="categories.php">All Category</a>
                        <a class="collapse-item" href="add-category.php">Add Category</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="works.php" data-toggle="collapse" data-target="#works"
                    aria-expanded="true" aria-controls="works">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Work</span>
                </a>
                <div id="works" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Works:</h6>
                        <a class="collapse-item" href="works.php">All Works</a>
                        <a class="collapse-item" href="add-work.php">Add Work</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="archive.php" data-toggle="collapse" data-target="#archive"
                    aria-expanded="true" aria-controls="archive">
                    <i class="fas fa-fw fa-lock"></i>
                    <span>Archive</span>
                </a>
                <div id="archive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Archive:</h6>
                        <a class="collapse-item" href="archive.php">All Archive</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="message.php">
                    <i class="fas fa-envelope fa-fw"></i>
                    <span>Message</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="profile.php">
                    <i class="fas fa-user fa-fw"></i>
                    <span>Profile</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="settings.php">
                    <i class="fas fa-cogs fa-fw"></i>
                    <span>Settings</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <?php
                        					//sql query
                        						$sql2 = "SELECT * FROM message_table ORDER BY id DESC LIMIT 10";
                        						//execute query
                        						$res2 = mysqli_query($conn, $sql2);
                        						//Count Rows
                        						$count2 = mysqli_num_rows($res2);
                        					 ?>
                                <span class="badge badge-danger badge-counter"><?php echo $count2; ?></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                  <?php
                                          //Create a SQL Query to get food display
                                          $sql = "SELECT * FROM message_table ORDER BY id DESC LIMIT 4";

                                          //Execute the Query
                                          $res = mysqli_query($conn, $sql);

                                          //Count rows to check whether we have foods or not
                                          $count = mysqli_num_rows($res);

                                          //create number variable and set default value as 1
                                          $sn=1;

                                          if($count>0)
                                          {
                                            //we have food in database
                                            //Get the food from database and display
                                            while($row=mysqli_fetch_assoc($res))
                                            {
                                              //get the value from individual colums
                                              $id = $row['id'];
                                              $full_name = $row['full_name'];
                                              $message = $row['message'];
                                              $date = $row['date'];
                                              ?>
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"><?php echo $message; ?></div>
                                        <div class="small text-gray-500"><?php echo $full_name; ?> · <?php echo $date; ?></div>
                                    </div>
                                    <?php
                                                  }

                                                }
                                                else
                                                {
                                                  //message not added in database
                                                  echo "<div class='font-weight-bold'>
                                                         <div class='text-truncate'>No Messages found in the database</div>
                                                        </div>";
                                                }
                                             ?>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="message.php">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <?php
                       //query to get all admin
                          $sql = "SELECT * FROM account";

                        //execute the Query
                        $res = mysqli_query($conn, $sql);

                        //checking whether the query is executed or not
                         if($res==TRUE)
                         {
                           // count rows to check whether we have data in database or not
                          $count = mysqli_num_rows($res);  // function to get all the rows in database

                           $sn=1; //Create a variable and assign the value

                           //check the num of rows
                           if($count>0)
                           {
                             //we have data in database
                             while($rows=mysqli_fetch_assoc($res))
                             {
                               //using while loop to get all the data from database
                               //adn while loop will run as long as we have data in database

                               //get individual data
                               $id=$rows['id'];
                               $username=$rows['username'];
                               $email=$rows['email'];
                               $image=$rows['image'];
                               $role=$rows['role'];
                               //display the value in out table
                               ?>
                               <?php
                                 $select = mysqli_query($conn, "SELECT * FROM `account` WHERE id = '$id'") or die('query failed');
                                 if(mysqli_num_rows($select) > 0){
                                    $fetch = mysqli_fetch_assoc($select);
                                 }
                              ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
                                    <?php
                                    if($fetch['image'] == ''){
                                 echo '<img src="img/undraw_profile.svg" alt="profile image" class="img-profile rounded-circle">';
                              }else{
                                 echo '<img src="images/'.$fetch['image'].'" class="img-profile rounded-circle">';
                              }
                           ?>
                           <?php
                                 }
                               }
                               else
                               {
                                 echo "<img src='img/undraw_profile.svg' alt='profile image' class='img-profile rounded-circle'>";
                               }
                             }
                             ?>
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="settings.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
