<?php
include '../includes/dbconfig.php';
$msg = "";

if (isset($_POST['submit'])) {
  $tel = $_POST['tel'];
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $name_of_org = $_POST['name_of_org'];
  $service_your_look = $_POST['service_your_look'];
  $message = $_POST['message'];
  $date = date("d M, Y");

  $sql = "INSERT INTO message_table (tel, full_name, email, name_of_org, service_your_look, message, date) VALUES ('$tel', '$full_name', '$email', '$name_of_org', '$service_your_look', '$message', '$date')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
      $msg = "<div class='alert alert-success'>Message has been sent successfully.</div>";
  } else {
      $msg = "<div class='alert alert-danger'>Something wrong went. Please try again.</div>";
  }
}
 ?>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <title>Contact • tharunkommaddi</title>
        <meta name="description" content="Archive of recent and past work made by Precious Onyenekwe. © Code by sseqmm">
        <meta name="robots" content="index, follow">

        <meta property="og:url" content="https://tharunkommaddi.com/contact">
        <meta property="og:title" content="Tharunkommaddi • Website Developer">
        <meta property="og:description" content="Helping brands thrive in the digital world. Located in The Pakistan. Delivering tailor-made digital designs and building interactive websites from scratch. © Code by sseqmm">
        <meta property="og:site_name" content="Tharunkommaddi" />
        <meta property="og:type" content="website" />
		<link rel="shortcut icon" href="tharunkommaddi.png" type="image/png" />
		<link rel="apple-touch-icon" href="tharunkommaddi.png">
        <link rel="canonical" href="contact.php">

        <link href="assets/css/normalize.css" rel="stylesheet">
        <link href="assets/css/locomotive-scroll.css" rel="stylesheet">
        <link href="assets/css/styleguide.css" rel="stylesheet">
        <link href="assets/css/components.css" rel="stylesheet">
        <link href="assets/css/style-new.css" rel="stylesheet">
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
                                        <h2>Work<div class="dot"></div></h2>
                                        <h2>About<div class="dot"></div></h2>
                                        <h2 class="active">Contact<div class="dot"></div></h2>
                                        <h2>Archive<div class="dot"></div></h2>
                                    </div>
                <div class="rounded-div-wrap bottom">
                    <div class="rounded-div"></div>
                </div>
            </div>
        </div>
        <main class="main" id="contact" data-barba="container" data-barba-namespace="contact" >
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
                                <a href="index.php" class="btn-click magnetic" data-strength="24" data-strength-text="12">
                                <span class="btn-text">
                                    <span class="btn-text-inner">Home</span>
                                </span>
                                </a>
                            </li>
                            <li class="btn btn-link">
                                <a href="work.php" class="btn-click magnetic" data-strength="24" data-strength-text="12">
                                <span class="btn-text">
                                    <span class="btn-text-inner">Work</span>
                                </span>
                                </a>
                            </li>
                            <li class="btn btn-link">
                                <a href="about.php" class="btn-click magnetic" data-strength="24" data-strength-text="12">
                                <span class="btn-text">
                                    <span class="btn-text-inner">About</span>
                                </span>
                                </a>
                            </li>
                            <li class="btn btn-link active">
                                <a href="contact.php" class="btn-click magnetic" data-strength="24" data-strength-text="12">
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
            <div class="main-wrap" data-scroll-container><header class="section default-header contact-header theme-dark" data-scroll-section>
   <div class="nav-bar">
    <div class="credits-top">
        <div class="btn btn-link btn-left-top">
            <a href="index.php" class="btn-click magnetic" data-strength="20" data-strength-text="10">
            <span class="btn-text">
                <div class="credit"><span>©</span></div><div class="cbd"><span class="code-by">Code by </span><span class="dennis"><span class="dennis-span">sseqmm</span></span></span></div>
            </span>
            </a>
        </div>
    </div>
    <ul class="links-wrap">
        <li class="btn btn-link">
            <a href="work.php" class="btn-click magnetic" data-strength="20" data-strength-text="10">
            <span class="btn-text">
                <span class="btn-text-inner">Work</span>
            </span>
            </a>
        </li>
        <li class="btn btn-link">
            <a href="about.php" class="btn-click magnetic" data-strength="20" data-strength-text="10">
            <span class="btn-text">
                <span class="btn-text-inner">About</span>
            </span>
            </a>
        </li>
        <li class="btn btn-link active">
            <a href="contact.php" class="btn-click magnetic" data-strength="20" data-strength-text="10">
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
</div>   <div class="container medium">
      <div class="row once-in">
         <div class="flex-col">
            <h1><span><div class="profile-picture"></div> Let's start a </span><span>project together</span></h1>
         </div>
         <div class="flex-col">
            <div class="profile-picture"></div>
            <div class="arrow"><?xml version="1.0" encoding="UTF-8"?>
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
</svg></div>
         </div>
      </div>
      <div class="row once-in">
         <div class="flex-col">
           <?php echo $msg;?>
            <form class="form" method="post" action="" enctype="multipart/form-data">
               <div class="form-col">
                  <label class="label" for="tel">Phone Number</label>
                  <input class="field" type="text" id="form-tel" name="tel" required placeholder="+234">
               </div>
               <div class="form-col">
                  <h5>01</h5>
                  <label class="label" for="name">What's your name?</label>
                  <input class="field" type="text" id="form-name" name="full_name" value="" required placeholder="John Doe *">
                                 </div>
               <div class="form-col">
                  <h5>02</h5>
                  <label class="label" for="email">What's your email?</label>
                  <input class="field" type="email" id="form-email" name="email" value="" required placeholder="john@doe.com *">
                                 </div>
               <div class="form-col">
                  <h5>03</h5>
                  <label class="label" for="email">What's the name of your organization?</label>
                  <input class="field" type="text" id="form-company" name="name_of_org" value="" required placeholder="John & Doe ®">
                                 </div>
               <div class="form-col">
                  <h5>04</h5>
                  <label class="label" for="email">What services are you looking for?</label>
                  <input class="field" type="text" id="form-service" name="service_your_look" value="" required placeholder="Web Design, Web Development ...">
                                 </div>
               <div class="form-col">
                  <h5>05</h5>
                  <label class="label" for="message">Your message</label>
                  <textarea class="field" type="text" id="form-message" name="message" rows="8"  required placeholder="Hello Dennis, can you help me with ... *"></textarea>
                                 </div>
               <div class="btn-contact-send">
                  <div class="btn btn-round" data-scroll data-scroll-speed="2" data-scroll-offset="-50%, 0%">
                     <div class="btn-click magnetic" data-strength="100" data-strength-text="50">
                        <div class="btn-fill"></div>
                        <span class="btn-text">
                           <input type="submit" name="submit" value="Send it!" class="form-btn">
                        </span>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <?php
         $sql7 = "SELECT * FROM contact_table";
         $result7 = mysqli_query($conn, $sql7);
         if (mysqli_num_rows($result7) > 0) {
         ?>
         <?php while ($row7 = mysqli_fetch_assoc($result7)) { ?>
         <div class="flex-col">
            <h5>Contact Details</h5>
            <ul class="links-wrap">
               <li class="btn btn-link btn-link-external">
                  <a href="mailto:<?php echo $row7['email']; ?>" class="btn-click magnetic" data-strength="20" data-strength-text="10">
                     <span class="btn-text">
                        <span class="btn-text-inner"><?php echo $row7['email']; ?></span>
                     </span>
                  </a>
               </li>
               <li class="btn btn-link btn-link-external">
                  <a href="tel:<?php echo $row7['phone_number']; ?>" class="btn-click magnetic" data-strength="20" data-strength-text="10">
                     <span class="btn-text">
                        <span class="btn-text-inner"><?php echo $row7['phone_number']; ?></span>
                     </span>
                  </a>
               </li>
            </ul>
            <h5>Business Details</h5>
            <ul class="links-wrap">
               <li><p>CoC: <?php echo $row7['coc']; ?></p></li>
               <li><p>VAT: <?php echo $row7['vat']; ?></p></li>
               <li><p>Location: <?php echo $row7['location']; ?></p></li>
            </ul>
            <h5>Socials</h5>
            <ul class="links-wrap">
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
         </div>
      </div>
   </div>
</header>
                                <footer class="section footer footer-contact theme-dark" data-scroll-section>
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
                            </div>
                        </div>
                    </footer>
                            </div>
                          <?php } ?>
                          <?php } ?>
        </main>
        <script src="../code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.0/js.cookie.min.js"></script>
        <script src="../cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <script src="../cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
        <script src="https://unpkg.com/@barba/core"></script>
        <script src="../cdn.jsdelivr.net/npm/vanilla-lazyload%4017.6.1/dist/lazyload.min.js"></script>

        <script src="assets/js/locomotive-scroll.min.js"></script>
        <script defer src="assets/js/index-new.js"></script>
      </body>

</html>
