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
    <script src="<?= $base_url ?>assets\vendor\image-crop\pixelarity-faceless.js"></script>

    <script src="<?= $base_url ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <div class="logo me-auto" style="position: relative;">
                <h1><a href="index.php" id="title"><?= $fieldvalues["title"] ?></a></h1>
                <button onclick="editField('title', 'text','')" class="btn btn-edit-sm btn-primary" role="button" style="top: 10px;right:-40px;"><i class="bi bi-pencil"></i> </button>

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
                    <div class="col-sm-3 d-flex flex-column justify-content-center" style="position: relative;">
                        <img id="aboutmeimg" src="<?= $base_url ?><?= $imgurls["aboutmeimg"] ?>" class="img-fluid" alt="" />
                        <button onclick="editImage('aboutmeimg',400,400)" class="btn btn-edit-sm btn-primary" role="button"><i class="bi bi-pencil"></i> </button>

                    </div>
                    <div class="col-sm-9 d-flex flex-column justify-content-center about-content">
                        <div class="section-title">
                            <h2>About Me</h2>
                            <p id="aboutme"><?php if (isset($fieldvalues["aboutme"])) {
                                                echo $fieldvalues["aboutme"];
                                            } ?></p>
                            <button onclick="editField('aboutme', 'textarea','')" class="btn btn-edit-sm btn-primary" role="button"><i class="bi bi-pencil"></i> </button>
                            <a href="about.php">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Us Section -->

        <!-- ======= Counts Section ======= -->
        <!-- <section class="counts section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
                        <div class="count-box">
                            <span data-purecounter-start="0" data-purecounter-end="57" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Articles Wrote</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="count-box">
                            <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Years Experience</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
                        <div class="count-box">
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Awards received</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
                        <div class="count-box">
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Hard Workers</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- End Counts Section -->

        <div style="position: relative;">
            <div id="opinions-view">
                <?php include('../components/opinions.php') ?>
            </div>

            <?php include('edit_opinions.php') ?>
            <button data-bs-toggle="modal" data-bs-target="#editOpinionsDialog" name="editOpinions" id="editOpinions" class="btn btn-edit btn-primary" style="top:130px" role="button"><i class="bi bi-pencil"></i> </button>
        </div>
        <div style="position: relative;">
            <div id="activities-view">
                <?php include('../components/recent_activities.php') ?>
            </div>
            <div id="editActivityContainer">
                <?php include('edit_activities.php') ?>
            </div>
            <button data-bs-toggle="modal" data-bs-target="#editActivitiesDialog" name="editActivities" id="editActivities" class="btn btn-edit btn-primary" style="top:130px" role="button"><i class="bi bi-pencil"></i> </button>
        </div>
        <!-- ======= Contact Us Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Contact Us</h2>
                </div>

                <div class="row">
                    <div class="col-lg-6 d-flex" data-aos="fade-up">
                        <div class="info-box">
                            <i class='bx bx-map'></i>
                            <h3>Address</h3>
                            <?php
                            if (isset($fieldvalues["address"])) {

                                echo "<address id='address'>" . $fieldvalues["address"] . "</address>";
                            } else {
                                echo "<address id='address'></address>";
                            }
                            ?>
                            <button onclick="editField('address', 'textarea','Append <br> for next line.')" class="btn btn-edit-sm btn-primary" role="button"><i class="bi bi-pencil"></i> </button>

                        </div>
                    </div>

                    <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="info-box">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <?php
                            if (isset($fieldvalues["email1"]))
                                echo "<a id='email1' href='mailto:" . $fieldvalues["email1"] . "'>" . $fieldvalues["email1"] . "</a>";
                            else
                                echo "<a id='email1' href='mailto:'>sample@sample.com</a>";
                            echo "<button onclick='editField(`email1`, `email`,`Enter email 1.`)' class='btn ' role='button'><i class='bi bi-pencil'></i> </button><br>";
                            if (isset($fieldvalues["email2"]))
                                echo "<a id='email2' href='mailto:" . $fieldvalues["email2"] . "'>" . $fieldvalues["email2"] . "</a>";
                            else
                                echo "<a id='email2' href='mailto:'>sample@sample.com</a>";
                            echo "<button onclick='editField(`email2`, `email`,`Enter email 2.`)' class='btn ' role='button'><i class='bi bi-pencil'></i> </button><br>";
                            ?>
                        </div>
                    </div>

                    <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-box">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <?php
                            if (isset($fieldvalues["phone1"]))
                                echo "<a id='phone1' href='tel:" . $fieldvalues["phone1"] . "'>" . $fieldvalues["phone1"] . "</a>";
                            else
                                echo "<a id='phone1' href='tel:'>+91</a>";
                            echo "<button onclick='editField(`phone1`, `tel`,`Enter Phone 1.`)' class='btn ' role='button'><i class='bi bi-pencil'></i> </button><br>";
                            if (isset($fieldvalues["email2"]))
                                echo "<a id='email2' href='tel:" . $fieldvalues["email2"] . "'>" . $fieldvalues["email2"] . "</a>";
                            else
                                echo "<a id='email2' href='tel:'>+91</a>";
                            echo "<button onclick='editField(`email2`, `tel`,`Enter phone 2.`)' class='btn ' role='button'><i class='bi bi-pencil'></i> </button><br>";
                            ?>
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
                        <div class="row">
                            <div class="social-links mt-3 col-7">
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
                            <button data-bs-toggle="modal" data-bs-target="#editSocialValues" onclick="editSocialValues(event)" name="editSocialValuesBtn" id="editSocialValuesBtn" class="btn btn-edit-sm btn-primary col-1" style="position: relative; top:0;margin-left:20px;" role="button"><i class="bi bi-pencil"></i> </button>
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

    <input type="file" accept="image/*" id="imageInput" style="display:none" />

    <!-- Edit Field Values modal -->
    <div class="modal fade" id="editFieldValues" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editFieldValuesLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" onsubmit="handleFieldValueSubmit(event)">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFieldValuesLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="fieldValue" class="form-label"></label>
                        <input type="textarea" rows='3' class="form-control" id="fieldValue" placeholder="Title">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Social Accounts -->
    <div class="modal fade" id="editSocialValues" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editFieldValuesLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" onsubmit="handleSocialSubmit(event)">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFieldValuesLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="facebook" class="form-label">facebook</label>
                        <input type="url" rows='3' name="facebook" class="form-control" id="editfacebook" placeholder="facebook">
                    </div>
                    <div class="mb-1">
                        <label for="twitter" class="form-label">twitter</label>
                        <input type="url" rows='3' class="form-control" name="twitter" id="edittwitter" placeholder="twitter">
                    </div>
                    <div class="mb-1">
                        <label for="instagram" class="form-label">instagram</label>
                        <input type="url" rows='3' class="form-control" id="editinstagram" name="instagram" placeholder="instagram">
                    </div>
                    <div class="mb-1">
                        <label for="linkedin" class="form-label">linkedin</label>
                        <input type="url" rows='3' class="form-control" id="editlinkedin" name="linkedin" placeholder="linkedin">
                    </div>
                    <div class="mb-1">
                        <label for="youtube" class="form-label">youtube</label>
                        <input type="url" rows='3' class="form-control" id="edityoutube" name="youtube" placeholder="youtube">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="<?= $base_url ?>assets/vendor/purecounter/purecounter.js"></script>
    <script src="<?= $base_url ?>assets/vendor/aos/aos.js"></script>
    <script src="<?= $base_url ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= $base_url ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= $base_url ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= $base_url ?>assets/vendor/owl-carousel/owl.carousel.min.js"></script>
    <!-- Template Main JS File -->
    <script src="<?= $base_url ?>assets/js/main.js"></script>

    <script>
        var editFieldValues = new bootstrap.Modal(document.getElementById('editFieldValues'), {
            keyboard: false
        })

        function editImage(id, width, height) {
            $('#imageInput').click();
            $('#imageInput').on('change', function(event) {
                var img = event.target.files[0];
                if (
                    !pixelarity.open(
                        img,
                        true,
                        function(image) {
                            var data = {
                                id: id,
                                value: image
                            }
                            $.ajax({
                                url: '<?= $base_url ?>admin/ajax/imgurls.php',
                                type: 'POST',
                                data: data,
                                success: function(res) {
                                    res = JSON.parse(res);
                                    if (res.success === true) {
                                        $('#' + id).attr('src', '<?= $base_url ?>' + res.url);
                                    }
                                }
                            });
                        },
                        "jpg",
                        0.8
                    )
                ) {
                    alert("Whoops! That is not an image!");
                }
            });
        }

        function editField(fieldId, type, helpText) {
            $('#editFieldValuesLabel').html(fieldId);
            let currentText = $('#' + fieldId).html();
            let parent = $('#fieldValue').parent();
            parent.find('label').text(helpText);
            $('#fieldValue').remove();
            let field = '';
            switch (type) {
                case 'text':
                    field = '<input type="text" class="form-control" id="fieldValue" value="' + currentText + '">';
                    break;
                case 'textarea':
                    field = '<textarea maxlength="500" class="form-control" id="fieldValue" rows="3" >' + currentText + '</textarea>';
                    break;
                default:
                    field = '<input type="' + type + '" class="form-control" id="fieldValue" value="' + currentText + '">';
            }
            parent.append(field);
            // $('#fieldValue').val(currentText);
            $('#fieldValue').attr('name', fieldId);
            editFieldValues.show();

        }

        function editSocialValues(e) {
            let facebook = $('#facebook').attr('href');
            let twitter = $('#twitter').attr('href');
            let instagram = $('#instagram').attr('href');
            let linkedin = $('#linkedin').attr('href');
            let youtube = $('#youtube').attr('href');
            $('#editfacebook').val(facebook);
            $('#edittwitter').val(twitter);
            $('#editinstagram').val(instagram);
            $('#editlinkedin').val(linkedin);
            $('#edityoutube').val(youtube);


        }

        async function handleSocialSubmit(e) {
            e.preventDefault();
            var data = objectifyForm($(e.target).serializeArray());
            $('#cover-spin').show(0);
            for (var key of Object.keys(data)) {
                //console.log(key + " -> " + p[key])

                let values = {
                    id: key,
                    value: data[key]
                }
                let response = await $.post('<?= $base_url ?>admin/ajax/fieldvalues.php', values);
                response = JSON.parse(response);
                if (response.success === true) {
                    if ($('#' + key).length > 0) {
                        $('#' + key).attr('href', data[key]);
                    } else if (data[key] !== '') {
                        $('.social-links').append(`<a href='${data[key]}' target='__blank' id='${key}'><i class='bx bxl-${key}'></i></a>`)
                    } else if (data[key] === '') {
                        $('#' + key).remove();
                    }
                } else {
                    alert('Something went wrong');
                }
            }

            $('#cover-spin').hide(0);
            $('#editSocialValues').find('.btn-close').click();

        }

        function handleFieldValueSubmit(e) {
            e.preventDefault();
            let fieldId = $('#fieldValue').attr('name');
            let fieldValue = $('#fieldValue').val();
            $('#' + fieldId).html(fieldValue);
            let data = {
                id: fieldId,
                value: fieldValue
            }
            $('#cover-spin').show(0);

            $.post('<?= $base_url ?>admin/ajax/fieldvalues.php', data, function(response) {
                response = JSON.parse(response);
                if (response.success === true) {
                    editFieldValues.hide();
                } else {
                    alert('Something went wrong');
                }
                $('#cover-spin').hide(0);

            });

        }
    </script>
    <div id="cover-spin"></div>
</body>

</html>