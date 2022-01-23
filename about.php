<!DOCTYPE html>
<html lang="en">
<?php
include './config/database.php';
include('./config/fieldvalues.php');
$base_url = url();
echo "<script>var base_url = '$base_url';</script>";

?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $fieldvalues["title"] ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <div class="logo me-auto">
        <h1><a href="index.php"><?= $fieldvalues["title"] ?></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="<?= $base_url ?>index.php">Home</a></li>
          <li><a class="nav-link active" href="#main">About Me</a></li>
          <li>
            <a class="nav-link" href="<?= $base_url ?>achievements.php">Achievements</a>
          </li>
          <li>
            <a class="nav-link" href="<?= $base_url ?>news.php">News</a>
          </li>
          <li><a class="nav-link" href="<?= $base_url ?>gallery.php">Gallery</a></li>
          <li><a class="nav-link" href="<?= $base_url ?>contact.php">Contact Me</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <!-- <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>About Me</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>About Me</li>
          </ol>
        </div>

      </div>
    </section> -->
    <!-- End Breadcrumbs Section -->


    <div class="container aboutheader" data-aos="fade-down">

      <div class="text-center px-5 py-md-3">
        <img src="<?= $imgurls["aboutmainimg"] ?>" id="aboutmainimg" alt="<?php if (isset($fieldvalues["abouttitle"])) echo $fieldvalues["abouttitle"];
                                                                          else echo ""; ?>" class="img-fluid rounded-circle" alt="" width="300px" height="300px" />
      </div>
      <div class="text-center section-title">
        <h2 id="abouttitle">
          <?php if (isset($fieldvalues["abouttitle"])) echo $fieldvalues["abouttitle"];
          else echo ""; ?>
        </h2>
        <p id="aboutsubtitle">
          <?php if (isset($fieldvalues["aboutsubtitle"])) echo $fieldvalues["aboutsubtitle"];
          else echo ""; ?>
        </p>
      </div>
    </div>


    <div class="about container" data-aos="fade-up">
      <div class="row">
        <div class="col-12 col-sm-4 col-md-2"><img src="<?= $imgurls["aboutcontent1img"] ?>" class="img-fluid" alt="" /></div>

        <div class="col-12 col-sm-8 col-md-10 d-flex flex-column justify-content-center content">
          <p><?= (isset($fieldvalues["aboutcontent1"])) ? $fieldvalues["aboutcontent1"] :  ""; ?></p>
        </div>
      </div>
    </div>



    <section class="container about-content" data-aos="fade-up">
      <div class="mx-5">
        <?php
        if (isset($fieldvalues["aboutpagecontent"])) {
          echo $fieldvalues["aboutpagecontent"];
        }

        ?>
      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-md-6 footer-info">
            <h3>
              <?php
              if (isset($fieldvalues["title"])) {
                echo $fieldvalues["title"];
              }
              ?>
            </h3>
            <p>
              <?php
              if (isset($fieldvalues["address"])) {
                echo "<address id='address'>" . $fieldvalues["address"] . "</address>";
              }
              if (isset($fieldvalues["phone1"]))
                echo "<strong>Phone:</strong> <a id='phone1' class='text-white' href='mailto:" . $fieldvalues["phone1"] . "'>" . $fieldvalues["phone1"] . "</a>";
              if (isset($fieldvalues["phone2"]))
                echo " / <a id='phone2' href='mailto:" . $fieldvalues["phone2"] . "'>" . $fieldvalues["phone2"] . "</a>";

              if (isset($fieldvalues["email1"]))
                echo "<br/> <strong>Email:</strong> <a id='email1' class='text-white' href='mailto:" . $fieldvalues["email1"] . "'>" . $fieldvalues["email1"] . "</a>";
              if (isset($fieldvalues["email2"]))
                echo " / <a id='email2' href='mailto:" . $fieldvalues["email2"] . "'>" . $fieldvalues["email2"] . "</a>";
              ?>
              <br>
              <!-- <strong>Phone:</strong> +1 5589 55488 55<br /> -->
              <!-- <strong>Email:</strong> info@example.com<br /> -->
            </p>
            <div class="social-links mt-3">
              <?php
              if (isset($fieldvalues["facebook"]) && $fieldvalues["facebook"] != "")
                echo "<a href='" . $fieldvalues["facebook"] . "' id='facebook'  target='__blank'><i class='bx bxl-facebook'></i></a>";
              if (isset($fieldvalues["twitter"]) && $fieldvalues["twitter"] != "")
                echo "<a href='" . $fieldvalues["twitter"] . "' id='twitter'  target='__blank'><i class='bx bxl-twitter'></i></a>";
              if (isset($fieldvalues["instagram"]) && $fieldvalues["instagram"] != "")
                echo "<a href='" . $fieldvalues["instagram"] . "' id='instagram'  target='__blank'><i class='bx bxl-instagram'></i></a>";
              if (isset($fieldvalues["linkedin"]) && $fieldvalues["linkedin"] != "")
                echo "<a href='" . $fieldvalues["linkedin"] . "' id='linkedin'  target='__blank'><i class='bx bxl-linkedin'></i></a>";
              if (isset($fieldvalues["youtube"]) && $fieldvalues["youtube"] != "")
                echo "<a href='" . $fieldvalues["youtube"] . "' id='youtube'  target='__blank'><i class='bx bxl-youtube'></i></a>";
              ?>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li>
                <i class="bx bx-chevron-right"></i> <a href="<?= $base_url ?>index.php">Home</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i> <a href="#main">About us</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i> <a href="<?= $base_url ?>achievements.php">Achievements</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i> <a href="<?= $base_url ?>news.php">News</a>
              </li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?= $base_url ?>gallery.php">Gallery</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?= $base_url ?>contact.php">Contact Me</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>


    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span><?= $fieldvalues['title'] ?></span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script>
    document.querySelector('.mobile-nav-toggle').addEventListener('click', function(e) {
      document.querySelector("#navbar").classList.toggle("navbar-mobile");
      this.classList.toggle("bi-list");
      this.classList.toggle("bi-x");
    })
    window.addEventListener("load", () => {
      AOS.init({
        duration: 1000,
        easing: "ease-in-out",
        once: true,
        mirror: false,
      });
    });
  </script>

</body>

</html>