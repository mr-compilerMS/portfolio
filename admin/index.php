<!DOCTYPE html>
<html lang="en">

<?php
include '../config/database.php';
include('../config/fieldvalues.php');
$base_url = url();
session_start();
if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)) {
    header("location: $base_url/admin/login.php");
    exit;
}
?>

<head>

    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title><?= $fieldvalues["title"] ?></title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="<?= $base_url ?>assets/img/favicon.png" rel="icon" />
    <link href="<?= $base_url ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="<?= $base_url ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet" />
    <link href="<?= $base_url ?>assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="<?= $base_url ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= $base_url ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="<?= $base_url ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="<?= $base_url ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="<?= $base_url ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="<?= $base_url ?>assets/vendor/owl-carousel/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?= $base_url ?>assets/vendor/owl-carousel/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?= $base_url ?>assets\vendor\image-crop\pixelarity.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="<?= $base_url ?>assets/css/style.css" rel="stylesheet" />
    <link href="<?= $base_url ?>assets/css/admin-style.css" rel="stylesheet" />
    <link href="<?= $base_url ?>assets/css/owl-carousel.css" rel="stylesheet" />
    <script src="<?= $base_url ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= $base_url ?>assets/vendor/bootstable/bootstable.js"></script>
    <script src="<?= $base_url ?>assets\vendor\image-crop\pixelarity-faceless.js"></script>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <div class="logo me-auto">
                <h1><a href="index.php"><?= $fieldvalues["title"] ?></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.php"><img src="<?= $base_url ?>assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About Me</a></li>
                    <li>
                        <a class="nav-link scrollto" href="#services">Achievements</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="#portfolio">News</a>
                    </li>
                    <li><a class="nav-link scrollto" href="#team">Gallery</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact Me</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->
    <div style="position: relative;">
        <?php include('../components/carousel.php') ?>
        <a name="editCarousel" id="editCarousel" class="btn btn-edit btn-primary" href="<?= $base_url ?>admin/edit_carousel.php" role="button"><i class="bi bi-pencil"></i> </a>
    </div>
    <main id="main">
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row no-gutters">
                    <div class="col-sm-3 d-flex flex-column justify-content-center">
                        <img src="<?= $base_url ?><?= $imgurls["aboutme"] ?>" class="img-fluid" alt="" />
                    </div>

                    <div class="
                col-sm-9
                d-flex
                flex-column
                justify-content-center
                about-content
              ">
                        <div class="section-title">
                            <h2>About Me</h2>
                            <p>
                                <?= $fieldvalues["aboutme"] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Us Section -->

        <!-- ======= Counts Section ======= -->
        <section class="counts section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
                        <div class="count-box">
                            <i class="bi bi-simple-smile" style="color: #20b38e"></i>
                            <span data-purecounter-start="0" data-purecounter-end="57" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Articles Wrote</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="count-box">
                            <i class="bi bi-document-folder" style="color: #c042ff"></i>
                            <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Years Experience</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
                        <div class="count-box">
                            <i class="bi bi-live-support" style="color: #46d1ff"></i>
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Awards received</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
                        <div class="count-box">
                            <i class="bi bi-users-alt-5" style="color: #ffb459"></i>
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Hard Workers</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Counts Section -->

        <div style="position: relative;">
            <div id="opinions-view">
                <?php include('../components/opinions.php') ?>
            </div>

            <?php include('edit_opinions.php') ?>
            <button data-bs-toggle="modal" data-bs-target="#editOpinionsDialog" name="editOpinions" id="editOpinions" class="btn btn-edit btn-primary" style="top:130px" role="button"><i class="bi bi-pencil"></i> </button>
        </div>

        <!-- ======= Recent Activities Section ======= -->
        <section id="portfolio" class="portfolio section-bg">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="section-title">
                    <h2>Recent Activities</h2>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web3">Web3</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="<?= $base_url ?>assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="" />
                            <div class="portfolio-info">
                                <h4>App 1</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="<?= $base_url ?>assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web3">
                        <div class="portfolio-wrap">
                            <img src="<?= $base_url ?>assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="" />
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="<?= $base_url ?>assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="<?= $base_url ?>assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="" />
                            <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="<?= $base_url ?>assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="<?= $base_url ?>assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="" />
                            <div class="portfolio-info">
                                <h4>Card 2</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="<?= $base_url ?>assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web3">
                        <div class="portfolio-wrap">
                            <img src="<?= $base_url ?>assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="" />
                            <div class="portfolio-info">
                                <h4>Web 2</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="<?= $base_url ?>assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="<?= $base_url ?>assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="" />
                            <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="<?= $base_url ?>assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="<?= $base_url ?>assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="" />
                            <div class="portfolio-info">
                                <h4>Card 1</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="<?= $base_url ?>assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="<?= $base_url ?>assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="" />
                            <div class="portfolio-info">
                                <h4>Card 3</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="<?= $base_url ?>assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web3">
                        <div class="portfolio-wrap">
                            <img src="<?= $base_url ?>assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="" />
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="<?= $base_url ?>assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Recent Activities Section -->

        <!-- ======= Contact Us Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Contact Us</h2>
                </div>

                <div class="row">
                    <div class="col-lg-6 d-flex" data-aos="fade-up">
                        <div class="info-box">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>
                    </div>

                    <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="info-box">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p>info@example.com<br />contact@example.com</p>
                        </div>
                    </div>

                    <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-box">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>+1 5589 55488 55<br />+1 6678 254445 41</p>
                        </div>
                    </div>

                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required />
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    Your message has been sent. Thank you!
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Us Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>Mamba</h3>
                        <p>
                            A108 Adam Street <br />
                            NY 535022, USA<br /><br />
                            <strong>Phone:</strong> +1 5589 55488 55<br />
                            <strong>Email:</strong> info@example.com<br />
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Home</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">About us</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Services</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Terms of service</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Privacy policy</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Web Design</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Web Development</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Product Management</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Marketing</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Graphic Design</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>
                            Tamen quem nulla quae legam multos aute sint culpa legam noster
                            magna
                        </p>
                        <form action="" method="post">
                            <input type="email" name="email" /><input type="submit" value="Subscribe" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Mamba</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= $base_url ?>assets/vendor/purecounter/purecounter.js"></script>
    <script src="<?= $base_url ?>assets/vendor/aos/aos.js"></script>
    <script src="<?= $base_url ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $base_url ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= $base_url ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= $base_url ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= $base_url ?>assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= $base_url ?>assets/vendor/owl-carousel/owl.carousel.min.js"></script>
    <!-- Template Main JS File -->
    <script src="<?= $base_url ?>assets/js/main.js"></script>

    <script>
        $(document).ready(function() {
            var silder = $(".owl-carousel");
            silder.owlCarousel({
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                items: 2,
                stagePadding: 20,
                center: true,
                nav: false,
                margin: 0,
                dots: false,
                loop: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    575: {
                        items: 2
                    },
                    768: {
                        items: 2
                    },
                    991: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    },
                },
            });
        });
    </script>
</body>

</html>