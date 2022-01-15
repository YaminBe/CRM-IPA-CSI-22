<?php 
session_start();
require 'env.php';
if (!empty($_SESSION['startResponden'])) {
     // echo " <script> window.location='?/=start';</script>"; 
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Usiusi Interior Bukittinggi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="public/web/img/favicon.png" rel="icon">
  <link href="public/web/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="public/web/vendor/aos/aos.css" rel="stylesheet">
  <link href="public/web/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/web/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="public/web/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="public/web/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="public/web/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="public/web/css/style.css" rel="stylesheet">

  <style type="text/css">
  input[type="checkbox"] {
  /*appearance: none;*/
  background-color: #fff;
  margin: 0;
  font: inherit;
  color: currentColor;
  width: 1.15em;
  height: 1.15em;
  border: 0.15em solid currentColor;
  border-radius: 50%;
  /*display:block;*/
}
.form-check{
  /*display: block;*/
}
@media screen and (max-width: 768px) {
 .kusioner{
font-size: 11px;
 }
input[type="checkbox"] {
  display:block;
}
.intruksi{
  font-size: 11px;
}
.info-cus{
  font-size: 12px;
}
}
</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <h1><a href="./"><b class="text-primary">UsiUsi</b></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
         <!-- <a href="./"><img src="public/assets/img/usiusi.png" alt="" class="img-fluid"> <b>USIUSI</b> Interior</a> -->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Usiusi</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>

    </div>
  </header><!-- End Header -->
  <?php 
    if (isset($_GET['/'])) {
      // $view = base64_decode($_GET['view']);
      $view = mysqli_escape_string($con,$_GET['/']);
      if ($view=='start') {
        include 'App/createAccount.php';
      }elseif ($view=='login') {
          include 'app/Views/loginFrom.php';
      }

      else{
        include 'app/Views/homeSection.php';
      }

    }else{
      include 'App/homeSection.php';
    }
   ?>
  

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Usiusi Interior Bukittinggi</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="public/web/vendor/aos/aos.js"></script>
  <script src="public/web/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="public/web/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="public/web/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="public/web/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="public/web/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="public/web/js/main.js"></script>
 <script type="text/javascript">

</script>
</body>

</html>
