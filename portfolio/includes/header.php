

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
</head>
<body>

    <div id="wrapper">
        <div class="collapse top-search" id="collapseExample">
            <div class="card card-block">
                <div class="newsletter-widget text-center">
                    <form action="<?php echo SITEURL; ?>category.php" method="POST" class="form-inline">
                        <input type="text" name="search" class="form-control" placeholder="What you are looking for?">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </form>
                </div><!-- end newsletter -->
            </div>
        </div><!-- end top-search -->

        <div class="topbar-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 hidden-xs-down">
                        <div class="topsocial">
                            <a href="https://facebook.com/groups/531575041938353/" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.youtube.com/channel/UCxhL1sPF20W3cdFqHAom8rg" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                            <a href="https://in.pinterest.com/preciousbobby230/" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="https://twitter.com/PreciousOnyene2?t=-4v-pvqYeZ3Evo9dOl1iCA&s=09" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.instagram.com/sseqmm/" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
							              <a href="https://chat.whatsapp.com/F4c6Bwy9S9kGQsuRAQ2EFa" target="_blank" data-toggle="tooltip" data-placement="bottom" title="whatsapp"><i class="fa fa-whatsapp"></i></a>
                            <a href="mailto:preciousonyenekwe48@gmail.com" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Google+"><i class="fa fa-google-plus"></i></a>
                        </div><!-- end social -->
                    </div><!-- end col -->

                    <div class="col-lg-4 hidden-md-down">
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="topsearch text-right">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-search"></i> Search</a>
                        </div><!-- end search -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end topbar -->

        <div class="header-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo">
                            <a href="index.php"><img src="images/version/garden-logo.png" alt=""></a>
                        </div><!-- end logo -->
                    </div>
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end header -->

        <header class="header">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-toggleable-md">
                    <div class="collapse navbar-collapse justify-content-md-center" id="Forest Timemenu">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                  <button style="cursor: pointer; background: none; outline: none;" class="nav-link color-green-hover">
                                    <a  href="index.php">Home</a></button>
                            </li>
                            <?php

                            $cat_limit = 8;
                            $sql = "SELECT * FROM categories ORDER BY cat_order LIMIT {$cat_limit}";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                            <li class="nav-item">
                              <form action="<?php echo SITEURL; ?>category.php" method="POST">
                                  <input type="hidden" name="search" value="<?php echo $row['cat_name']; ?>" placeholder="Search....">
                                  <button style="cursor: pointer; background: none; outline: none;" type="submit" name="submit" class="nav-link color-green-hover"><?php echo $row['cat_name']; ?></button>
                                </form>
                            </li>
                            <?php } }


                            $sql1 = "SELECT * FROM categories ORDER BY cat_order LIMIT 999999 OFFSET {$cat_limit}";
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1) > 0) {

                            ?>
                            <div class="nav-item dropdown">
                                <button style="cursor: pointer; background: none; outline: none;" href="#" class="nav-link dropdown-toggle color-green-hover" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    More
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="border: 1px solid #eee; height: 300%; overflow-y: scroll; cursor: pointer;">
                                    <?php
                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                    ?>
                                  <form action="<?php echo SITEURL; ?>category.php" method="POST">
                                    <input type="hidden" name="search" value="<?php echo $row1['cat_name']; ?>" placeholder="Search....">
                                    <button type="submit" name="submit" class="dropdown-item"><?php echo $row1['cat_name']; ?></button>
                                  </form>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                            <li class="nav-item">

                                <button style="cursor: pointer; background: none; outline: none;" class="nav-link color-green-hover">
                                  <a href="contact.php">
                                    Contact</a></button>
                            </li>
                            <li>
                              <button style="cursor: pointer; background: none; outline: none;border: 1px solid #eee;cursor: pointer;" class="nav-link color-green-hover" id="google_element">
                              </button>
                            </li>
            				   <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
                        </ul>
                    </div>
                </nav>
            </div><!-- end container -->
        </header><!-- end header -->
