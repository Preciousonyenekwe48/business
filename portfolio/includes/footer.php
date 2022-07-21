<footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="widget">
                            <div class="footer-text text-center">
                                <a href="index.php"><img src="images/version/garden-footer-logo.png" alt="" class="img-fluid"></a>
                                <p>General blog is a that focus on the intentions of people, giving them good information and educating them on
								  what actions they are expected to carry out.
								  As the name implies "General" that should tell you that whatever your looking for will be written down on this blog,
								  and you can also download various paid items for free and buy ditigal products and books for yourselves, <br> whatever
								  your looking for and you can't find it please write me a mail
								  <a href="mailto:preciousonyenekwe48@gmail.com" style="color: blue;">Precious Onyenekwe</a>, so that i can add it.</p>
								  Please don't forget to support this page,<a href="https://barter.me/sseqmmmediainfo?currency=USD" style="color: blue;">Click here to support us</a>
                                <div class="social">
                                    <a href="https://facebook.com/groups/531575041938353/" data-toggle="tooltip" target="_blank" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="https://twitter.com/PreciousOnyene2?t=-4v-pvqYeZ3Evo9dOl1iCA&s=09" data-toggle="tooltip" target="_blank" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="https://www.instagram.com/sseqmm/" data-toggle="tooltip" target="_blank" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
									                  <a href="https://chat.whatsapp.com/F4c6Bwy9S9kGQsuRAQ2EFa" target="_blank" data-toggle="tooltip" data-placement="bottom" title="whatsapp"><i class="fa fa-whatsapp"></i></a>
                                    <a href="mailto:preciousonyenekwe48@gmail" data-toggle="tooltip" target="_blank" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                    <a href="https://in.pinterest.com/preciousbobby230/" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
									                  <a href="https://www.youtube.com/channel/UCxhL1sPF20W3cdFqHAom8rg" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                </div>

                                <hr class="invis">
                                <?php

                                $msg = "";

                                if (isset($_POST['subscribe'])) {
                                    $email = $_POST['email'];
                                    $date = date("d M, Y");

                                    $sql = "INSERT INTO subscribe (email, date) VALUES ('$email', '$date')";
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        $msg = "<div class='alert alert-success'>Thanks for Subscribing,
                                        <br> you will get updated as soon as we drop our next article.</div>";
                                    } else {
                                        $msg = "<div class='alert alert-danger'>Something wrong went. Please try again.</div>";
                                    }
                                }

                                ?>
                                <div class="newsletter-widget text-center">
                                    <form class="form-inline" action="" method="post">
                                      <?php echo $msg; ?>
                                        <input type="text" name="email" class="form-control" placeholder="Enter your email address">
                                        <button type="submit" name="subscribe" class="btn btn-primary">Subscribe <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div><!-- end newsletter -->
                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <br>
                        <div class="copyright">advance development by: <a href="https://precious-profolio.web.app">precious ugochukwu</a>.</div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="js/slider.js"></script>
	  <script type="text/javascript" src="js/custom.js"></script>
	  <script type="text/javascript" src="js/tether.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script>
  function loadGoogleTranslate(){
    new google.translate.TranslateElement("google_element");
  }
    </script>
    <!-- Core JavaScript
    ================================================== -->

</body>
</html>
