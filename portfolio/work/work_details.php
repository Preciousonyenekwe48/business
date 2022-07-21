<?php
include '../includes/dbconfig.php';
?>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <title>Work @ Details • Tharunkommaddi</title>
        <meta name="description" content="Archive of recent and past work made by Precious Onyenekwe. © Code by sseqmm">
        <meta name="robots" content="index, follow">

        <meta property="og:url" content="https://tharunkommaddi.com/work_details">
        <meta property="og:title" content="Tharunkommaddi • Website Developer">
        <meta property="og:description" content="Helping brands thrive in the digital world. Located in The Pakistan. Delivering tailor-made digital designs and building interactive websites from scratch. © Code by sseqmm">
        <meta property="og:site_name" content="Tharunkommaddi" />
        <meta property="og:type" content="website" />
		<link rel="shortcut icon" href="tharunkommaddi.png" type="image/png" />
		<link rel="apple-touch-icon" href="tharunkommaddi.png">

        <link rel="canonical" href="work_details.php">

        <link href="../assets/css/normalize.css" rel="stylesheet">
         <link href="../assets/css/locomotive-scroll.css" rel="stylesheet">
         <link href="../assets/css/styleguide.css" rel="stylesheet">
         <link href="../assets/css/components.css" rel="stylesheet">
         <link href="../assets/css/style-new.css" rel="stylesheet">
    </head>

    <body data-barba="wrapper">
        <div class="no-scroll-overlay"></div>
        <div class="loading-container">
            <div class="loading-screen">
                <div class="rounded-div-wrap top">
                    <div class="rounded-div"></div>
                </div>
                <div class="loading-words">
                    <h2 class="home-active home-active-first">Welcome<div class="dot"></div></h2>
                    <h2 class="home-active">Bienvenue<div class="dot"></div></h2>
                    <h2 class="home-active">स्वागते<div class="dot"></div></h2>
                    <h2 class="home-active">Bem-vindo<div class="dot"></div></h2>
                    <h2 class="home-active">Selamat datang<div class="dot"></div></h2>
                    <h2 class="home-active jap">أهلا وسهلا<div class="dot"></div></h2>
                    <h2 class="home-active">Benarrivata<div class="dot"></div></h2>
                    <h2 class="home-active">Ласкаво просимо<div class="dot"></div></h2>
                    <h2 class="home-active-last">いらっしゃいませ<div class="dot"></div></h2>
                                        <h2>Home<div class="dot"></div></h2>
                                        <h2 class="active">Work<div class="dot"></div></h2>
                                        <h2>About<div class="dot"></div></h2>
                                        <h2>Contact<div class="dot"></div></h2>
                                        <h2>Archive<div class="dot"></div></h2>
                                    </div>
                <div class="rounded-div-wrap bottom">
                    <div class="rounded-div"></div>
                </div>
            </div>
        </div>
        <main class="main" id="work-single" data-barba="container" data-barba-namespace="work-single" >
                                                        <div class="mouse-pos-list-image no-select"></div>
            <div class="mouse-pos-list-btn no-select"></div>
            <div class="mouse-pos-list-span no-select"><p>Next case</p></div>
                        <div class="btn btn-hamburger">
                <div class="btn-click magnetic" data-strength="50" data-strength-text="25">
                    <div class="btn-fill"></div>
                    <div class="btn-text">
                        <div class="btn-bars"></div>
                        <span class="btn-text-inner">Menu</span>
                    </div>
                </div>
            </div>
            <div class="overlay fixed-nav-back"></div>
            <div class="fixed-nav theme-dark">
                <div class="fixed-nav-rounded-div">
                    <div class="rounded-div-wrap">
                        <div class="rounded-div"></div>
                    </div>
                </div>
                <div class="fixed-nav-inner">
                    <div class="row nav-row">
                        <h5>Navigation</h5>
                        <div class="stripe"></div>
                        <ul class="links-wrap">
                            <li class="btn btn-link">
                                <a href="../index.php" class="btn-click magnetic" data-strength="24" data-strength-text="12">
                                <span class="btn-text">
                                    <span class="btn-text-inner">Home</span>
                                </span>
                                </a>
                            </li>
                            <li class="btn btn-link active">
                                <a href="../work.php" class="btn-click magnetic" data-strength="24" data-strength-text="12">
                                <span class="btn-text">
                                    <span class="btn-text-inner">Work</span>
                                </span>
                                </a>
                            </li>
                            <li class="btn btn-link">
                                <a href="../about.php" class="btn-click magnetic" data-strength="24" data-strength-text="12">
                                <span class="btn-text">
                                    <span class="btn-text-inner">About</span>
                                </span>
                                </a>
                            </li>
                            <li class="btn btn-link">
                                <a href="../contact.php" class="btn-click magnetic" data-strength="24" data-strength-text="12">
                                <span class="btn-text">
                                    <span class="btn-text-inner">Contact</span>
                                </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="row social-row">
                        <div class="stripe"></div>
                        <div class="socials">
                            <?php

                              $sql = "SELECT * FROM contact_table";
                              $result = mysqli_query($conn, $sql);
                              if (mysqli_num_rows($result) > 0) {

                              ?>
                              <h5>Socials</h5>
                              <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <ul>
                                    <li class="btn btn-link btn-link-external">
                                        <a href="<?php echo $row["website"]; ?>" target="_blank" class="btn-click magnetic" data-strength="20" data-strength-text="10">
                                            <span class="btn-text">
                                                <span class="btn-text-inner">Website</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="btn btn-link btn-link-external">
                                        <a href="<?php echo $row["instagram"]; ?>" target="_blank" class="btn-click magnetic" data-strength="20" data-strength-text="10">
                                            <span class="btn-text">
                                                <span class="btn-text-inner">Instagram</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="btn btn-link btn-link-external">
                                        <a href="<?php echo $row["whatsapp"]; ?>" target="_blank" class="btn-click magnetic" data-strength="20" data-strength-text="10">
                                            <span class="btn-text">
                                                <span class="btn-text-inner">Whatsapp</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="btn btn-link btn-link-external">
                                        <a href="<?php echo $row["dribble"]; ?>" target="_blank" class="btn-click magnetic" data-strength="20" data-strength-text="10">
                                            <span class="btn-text">
                                                <span class="btn-text-inner">Dribbble</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="btn btn-link btn-link-external">
                                        <a href="<?php echo $row["linkedin"]; ?>" target="_blank" class="btn-click magnetic" data-strength="20" data-strength-text="10">
                                            <span class="btn-text">
                                                <span class="btn-text-inner">LinkedIn</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                              <?php } ?>
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-wrap" data-scroll-container><section class="section case-top-wrap " >
<header class="section default-header case-header" data-scroll-section>
   <div class="nav-bar">
    <div class="credits-top">
        <div class="btn btn-link btn-left-top">
            <a href="../index.php" class="btn-click magnetic" data-strength="20" data-strength-text="10">
            <span class="btn-text">
                <div class="credit"><span>©</span></div><div class="cbd"><span class="code-by">Code by </span><span class="dennis"><span class="dennis-span">sseqmm</span></span></span></div>
            </span>
            </a>
        </div>
    </div>
    <ul class="links-wrap">
        <li class="btn btn-link active">
            <a href="../work.php" class="btn-click magnetic" data-strength="20" data-strength-text="10">
            <span class="btn-text">
                <span class="btn-text-inner">Work</span>
            </span>
            </a>
        </li>
        <li class="btn btn-link">
            <a href="../about.php" class="btn-click magnetic" data-strength="20" data-strength-text="10">
            <span class="btn-text">
                <span class="btn-text-inner">About</span>
            </span>
            </a>
        </li>
        <li class="btn btn-link">
            <a href="../contact.php" class="btn-click magnetic" data-strength="20" data-strength-text="10">
            <span class="btn-text">
                <span class="btn-text-inner">Contact</span>
            </span>
            </a>
        </li>
        <li class="btn btn-link btn-menu">
            <div class="btn-click magnetic" data-strength="20" data-strength-text="10">
                <div class="btn-text">
                    <span class="btn-text-inner">Menu</span>
                </div>
            </div>
        </li>
    </ul>
</div>   <div class="container medium once-in">
      <div class="row">
         <div class="flex-col">
           <?php
             //Check whether the id is set or not
             if (isset($_GET["id"]) && isset($_GET['wallpaper']))
             {
               $id = $_GET["id"];
               $wallpaper = $_GET["wallpaper"];
               $sql9 = "SELECT * FROM work_table WHERE id='$id' AND wallpaper='$wallpaper'";

             //Execute the Query
             $res9 = mysqli_query($conn, $sql9);

             //count the rows to check whether the id is valid or not
             $count9 = mysqli_num_rows($res9);

             if($count9==1)
             {
              //Get all the data
              $row9 = mysqli_fetch_assoc($res9);
              $work_title = $row9['work_title'];
              $website_link = $row9['website_link'];
              $roles_services = $row9['roles_services'];
              $credits_design = $row9['credits_design'];
              $credits_copy = $row9['credits_copy'];
              $location_year = $row9['location_year'];
              $wallpaper = $row9['wallpaper'];
              $website_video = $row9['website_video'];
              $mobile1_website_image = $row9['mobile1_website_image'];
              $mobile2_website_image = $row9['mobile2_website_image'];
              $mobile_website_video = $row9['mobile_website_video'];
              $tablet_website_video = $row9['tablet_website_video'];
              $tablet_website_section_video = $row9['tablet_website_section_video'];
              $cat_id=$row9['cat_id'];
              $date=$row9['date'];
             }
             else
             {
              //redirect to category admin page with message
              header('location:'.SITEURL.'index.php');
             }
             }
             else
             {
             //redirect to admin category
             header('location:'.SITEURL.'index.php');
             }

            ?>
            <h1><?php echo $work_title; ?></h1>
         </div>
      </div>
   </div>
</header>
<section class="section case-intro once-in" data-scroll-section>
   <div class="container medium">
      <div class="row">
         <div class="flex-col">
            <h5>Role / Services</h5>
            <div class="stripe"></div>
            <li><p><?php echo $roles_services; ?></p></li>
         </div>
         <div class="flex-col">
            <h5>Credits</h5>            <div class="stripe"></div>
            <li><p>Design: <?php echo $credits_design; ?></p></li><li><p>Copy: <?php echo $credits_copy; ?></p></li>         </div>
         <div class="flex-col">
            <h5>Location & year</h5>            <div class="stripe"></div>
            <li><p><?php echo $location_year; ?></p></li>
         </div>
      </div>
   </div>
</section>
<section class="section case-intro-image once-in block-padding-bottom "  data-scroll-section>
   <div class="container">
      <div class="row">
         <div class="flex-col">
            <div class="btn-wrap theme-dark">
               <div class="btn btn-round" data-scroll data-scroll-speed="2"  data-scroll-position="top">
                  <a href="<?php echo $website_link; ?>" target="_blank" class="btn-click magnetic " data-strength="100" data-strength-text="50">
                     <div class="btn-fill"></div>
                     <span class="btn-text">
                        <span class="btn-text-inner">Live site <div class="arrow"><?xml version="1.0" encoding="UTF-8"?>
<svg width="14px" height="14px" viewBox="0 0 14 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>arrow-up-right</title>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Artboard" transform="translate(-1019.000000, -279.000000)" stroke="#FFFFFF" stroke-width="1.5">
            <g id="arrow-up-right" transform="translate(1026.000000, 286.000000) rotate(90.000000) translate(-1026.000000, -286.000000) translate(1020.000000, 280.000000)">
                <polyline id="Path" points="2.76923077 0 12 0 12 9.23076923"></polyline>
                <line x1="12" y1="0" x2="0" y2="12" id="Path"></line>
            </g>
        </g>
    </g>
</svg></div></span>
                     </span>
                  </a>
               </div>
            </div>
            <div class="single-image">
               <img class="overlay lazy" data-scroll data-scroll-speed="-1" src="<?php if (file_exists('../media/' . $wallpaper)) { echo '../media/' . $wallpaper; }?>"/>
                  <img class="overlay overlay-image-top lazy" src="<?php if (file_exists('../media/' . $wallpaper)) { echo '../media/' . $wallpaper; }?>" />
                </div>
         </div>
      </div>
   </div>
</section>
</section>
<section class="section single-block block-device block_0  " style="background-color: #e7dfe3;" data-scroll-section>
   <div class="container">
      <div class="row device-macprohigher">
         <div class="flex-col">
            <div class="device">
               <div class="single-image">

                  <div class="overlay overlay-image playpauze"><video class="overlay" src="<?php if (file_exists('../media/' . $website_video)) { echo '../media/' . $website_video; }?>" loop muted playsinline></video></div>

               </div>

               <div class="overlay-device-image"><div class="overlay overlay-device" style="background: url('../assets/img/device-macpro-higher.png') center center no-repeat; background-size: cover;"></div></div>
                           </div>
         </div>
      </div>
   </div>
</section><section class="section single-block block-mobile-devices block_1" data-scroll-section style="background-color: #e7dfe3;">
   <div class="container no-padding block-padding-sides amount-3">
      <div class="row device-nodevice">
         <div class="flex-col block-padding-bottom" >
            <div class="device" data-scroll data-scroll-target=".block_1" data-scroll-speed="1">
               <div class="single-image">

                  <img class="overlay overlay-image lazy" src="<?php if (file_exists('../media/' . $mobile1_website_image)) { echo '../media/' . $mobile1_website_image; }?>" width="540" height="1170" />
                                 </div>
                           </div>
         </div>
                  <div class="flex-col block-padding-bottom" >
            <div class="device">
               <div class="single-image">

                  <img class="overlay overlay-image lazy" src="<?php if (file_exists('../media/' . $mobile2_website_image)) { echo '../media/' . $mobile2_website_image; }?>" width="540" height="1170" />
                                 </div>
                           </div>
         </div>
                           <div class="flex-col block-padding-bottom" >
            <div class="device" data-scroll data-scroll-target=".block_1" data-scroll-speed="-1">
               <div class="single-image">

                  <div class="overlay overlay-image playpauze"><video class="overlay" src="<?php if (file_exists('../media/' . $mobile_website_video)) { echo '../media/' . $mobile_website_video; }?>" loop muted playsinline></video></div>                                 </div>
                           </div>
         </div>
               </div>
   </div>
</section>

<section class="section single-block block-fullwidth block_2" data-scroll-section>
   <div class="row">
      <div class="flex-col">
         <div class="single-image">

            <img class="overlay overlay-image lazy"  data-scroll data-scroll-speed="-1" src="<?php if (file_exists('../media/' . $wallpaper)) { echo '../media/' . $wallpaper; }?>" width="3000" height="2001" />
                        <div class="overlay dark-overlay" style="opacity: 0;"></div>
                        <div class="overlay text-overlay theme-dark">
               <div class="container">
                  <h2>The quality of passion</h2>
               </div>
            </div>
                     </div>
      </div>
   </div>
</section><section class="section single-block block-device block_3  " style="background-color: #e7dfe3;" data-scroll-section>
   <div class="container">
      <div class="row device-nodevice">
         <div class="flex-col">
            <div class="device">
               <div class="single-image">

                  <div class="overlay overlay-image playpauze"><video class="overlay" src="<?php if (file_exists('../media/' . $tablet_website_video)) { echo '../media/' . $tablet_website_video; }?>" loop muted playsinline></video></div>

               </div>
                           </div>
         </div>
      </div>
   </div>
</section><section class="section single-block block-device block_4 block-padding-bottom " style="background-color: #e7dfe3;" data-scroll-section>
   <div class="container">
      <div class="row device-nodevice">
         <div class="flex-col">
            <div class="device">
               <div class="single-image">

                  <div class="overlay overlay-image playpauze"><video class="overlay" src="<?php if (file_exists('../media/' . $tablet_website_section_video)) { echo '../media/' . $tablet_website_section_video; }?>" loop muted playsinline></video></div>

               </div>
                           </div>
         </div>
      </div>
   </div>
</section><div class="footer-rounded-div" data-scroll-section>
   <div class="rounded-div-wrap">
      <div class="rounded-div" style="background-color: #e7dfe3;"></div>
   </div>
</div>
<div class="footer-wrap footer-case-wrap theme-dark" data-scroll-section>
   <section class="section footer" data-scroll data-scroll-speed="-4" data-scroll-position="bottom">

      <div class="container medium">
        <?php

       $sql5 = "SELECT * FROM work_table ORDER BY id DESC LIMIT 1";
       $result5 = mysqli_query($conn, $sql5);
       if (mysqli_num_rows($result5) > 0) {

       ?>
       <?php while ($row5 = mysqli_fetch_assoc($result5)) { ?>
         <a href="work_details.php?id=<?php echo $row5['id']; ?>&wallpaper=<?php echo $row5['wallpaper']; ?>" class="row next-case-btn">
            <div class="flex-col">
               <p>Next case</p>
               <h2><?php echo $row5['work_title']; ?></h2>
            </div>
            <div class="tile-image-wrap">
               <div class="tile-image">
              <img class="overlay overlay-image lazy" data-scroll data-scroll-speed="2.5" data-scroll-position="bottom"
              style="background-color:#B1A994; background-position: center center; background-repeat: no-repeat; background-size: cover;"
              src="<?php if (file_exists('../media/' . $row5['mobile1_website_image'])) { echo '../media/' . $row5['mobile1_website_image']; }?>"
              data-bg="<?php if (file_exists('../media/' . $row5['mobile1_website_image'])) { echo '../media/' . $row5['mobile1_website_image']; }?>">
            </div>
          </div>
         </a>
       <?php } ?>
       <?php } ?>
         <div class="row">
            <div class="flex-col">
               <div class="stripe"></div>
            </div>
         </div>
         <div class="row">
            <div class="flex-col">
               <div class="btn btn-normal">
                  <a href="../work.php" class="btn-click magnetic" data-strength="25" data-strength-text="15">
                     <div class="btn-fill"></div>
                     <span class="btn-text">
                       <?php
                         //sql query
                           $sql8 = "SELECT * FROM work_table";
                           //execute query
                           $res8 = mysqli_query($conn, $sql8);
                           //Count Rows
                           $count8 = mysqli_num_rows($res8);
                          ?>
                        <span class="btn-text-inner change">All work<div class="count-nr"><?php echo $count8; ?></div></span>
                     </span>
                  </a>
               </div>
            </div>
         </div>
      </div>
      <div class="container no-padding">
         <div class="row bottom-footer">
            <div class="flex-col">
               <div class="credits">
                     <h5>Version</h5>
                     <p>2022 © Edition</p>
               </div>
               <div class="time">
                     <h5>Local time</h5>
                     <p><span id="timeSpan">09:41 PM CET</span></p>
               </div>
            </div>
            <div class="flex-col">
               <div class="socials">
                 <?php
                 $sql7 = "SELECT * FROM contact_table";
                 $result7 = mysqli_query($conn, $sql7);
                 if (mysqli_num_rows($result7) > 0) {
                 ?>
                 <?php while ($row7 = mysqli_fetch_assoc($result7)) { ?>
                     <h5>Socials</h5>
                     <ul>
                        <li class="btn btn-link btn-link-external">
                           <a href="<?php echo $row7['website']; ?>" target="_blank" class="btn-click magnetic" data-strength="20" data-strength-text="10">
                                 <span class="btn-text">
                                    <span class="btn-text-inner">Website</span>
                                 </span>
                           </a>
                        </li>
                        <li class="btn btn-link btn-link-external">
                           <a href="<?php echo $row7['instagram']; ?>" target="_blank" class="btn-click magnetic" data-strength="20" data-strength-text="10">
                                 <span class="btn-text">
                                    <span class="btn-text-inner">Instagram</span>
                                 </span>
                           </a>
                        </li>
                        <li class="btn btn-link btn-link-external">
                           <a href="<?php echo $row7['whatsapp']; ?>" target="_blank" class="btn-click magnetic" data-strength="20" data-strength-text="10">
                                 <span class="btn-text">
                                    <span class="btn-text-inner">Whatsapp</span>
                                 </span>
                           </a>
                        </li>
                        <li class="btn btn-link btn-link-external">
                           <a href="<?php echo $row7['dribble']; ?>" target="_blank" class="btn-click magnetic" data-strength="20" data-strength-text="10">
                                 <span class="btn-text">
                                    <span class="btn-text-inner">Dribbble</span>
                                 </span>
                           </a>
                        </li>
                        <li class="btn btn-link btn-link-external">
                           <a href="<?php echo $row7['linkedin']; ?>" target="_blank" class="btn-click magnetic" data-strength="20" data-strength-text="10">
                                 <span class="btn-text">
                                    <span class="btn-text-inner">LinkedIn</span>
                                 </span>
                           </a>
                        </li>
                     </ul>
                     <div class="stripe"></div>
               </div>
            </div>
          <?php } ?>
          <?php } ?>
         </div>
      </div>
   </section>
   <div class="overlay overlay-gradient"></div>
</div>
                                            </div>
        </main>
        <script src="../../code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../../cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.0/js.cookie.min.js"></script>
        <script src="../../cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <script src="../../cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
        <script src="https://unpkg.com/@barba/core"></script>
        <script src="../../cdn.jsdelivr.net/npm/vanilla-lazyload%4017.6.1/dist/lazyload.min.js"></script>

        <script src="../assets/js/locomotive-scroll.min.js"></script>        <script defer src="../assets/js/index-new.js"></script>    </body>

</html>
