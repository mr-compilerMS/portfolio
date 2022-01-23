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
  <link href="<?= $base_url ?>assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="<?= $base_url ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= $base_url ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="<?= $base_url ?>assets\vendor\image-crop\pixelarity.css" rel="stylesheet" />
  <link href="<?= $base_url ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= $base_url ?>assets/css/style.css" rel="stylesheet" />
  <link href="<?= $base_url ?>assets/css/admin-style.css" rel="stylesheet" />
  <script src="<?= $base_url ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= $base_url ?>assets\vendor\image-crop\pixelarity-faceless.js"></script>

  <script src="<?= $base_url ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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
          <li><a class="nav-link" href="<?= $base_url ?>admin/index.php">Home</a></li>
          <li><a class="nav-link active" href="#main">About Me</a></li>
          <li>
            <a class="nav-link" href="<?= $base_url ?>admin/achievements.php">Achievements</a>
          </li>
          <li>
            <a class="nav-link" href="<?= $base_url ?>admin/news.php">News</a>
          </li>
          <li><a class="nav-link" href="<?= $base_url ?>admin/gallery.php">Gallery</a></li>
          <li><a class="nav-link" href="<?= $base_url ?>admin/contact.php">Contact Me</a></li>
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

      <div class="text-center px-5 py-md-3" style="position: relative;">
        <img src="<?= $imgurls["aboutmainimg"] ?>" id="aboutmainimg" alt="<?= (isset($fieldvalues["abouttitle"])) ? $fieldvalues["abouttitle"] : "" ?>" class="img-fluid rounded-circle" alt="" width="300px" height="300px" />
        <button onclick="editImage('aboutmainimg',400,400)" class="btn btn-edit-sm btn-primary" role="button" style="position: relative;"><i class="bi bi-pencil"></i> </button>

      </div>
      <div class="text-center section-title" style="position: relative;">
        <h2 id="abouttitle">
          <?= (isset($fieldvalues["abouttitle"])) ? $fieldvalues["abouttitle"] : "abouttitle"; ?>
        </h2>
        <button onclick="editField('abouttitle', 'text','')" class="btn btn-edit-sm btn-primary" role="button"><i class="bi bi-pencil"></i> </button>

        <p id="aboutsubtitle">
          <?= (isset($fieldvalues["aboutsubtitle"])) ? $fieldvalues["aboutsubtitle"] : "aboutsubtitle"; ?>
        </p>
        <button onclick="editField('aboutsubtitle', 'text','')" class="btn btn-edit-sm btn-primary" style="top: 60px;" role="button"><i class="bi bi-pencil"></i> </button>

      </div>
    </div>

    <section class="about-content container" data-aos="fade-up">
      <div class="row">
        <div class="col-12 col-sm-4 col-md-3 col-lg-2" style="position: relative;"><img src="<?= $imgurls["aboutcontent1img"] ?>" id="aboutcontent1img" alt="aboutcontent" width="100%" height="100%" class="img-fluid" alt="" /><button onclick="editImage('aboutcontent1img',400,400)" class="btn btn-edit-sm btn-primary" role="button" style="position: relative;"><i class="bi bi-pencil"></i> </button></div>

        <div class="col-12 col-sm-8 col-md-9 col-lg-10 d-flex flex-column justify-content-center content">
          <p id="aboutcontent1"><?= (isset($fieldvalues["aboutcontent1"])) ? $fieldvalues["aboutcontent1"] :  ""; ?></p>
          <button onclick="editField('aboutcontent1', 'textarea','')" class="btn btn-edit-sm btn-primary" style="top: 60px;" role="button"><i class="bi bi-pencil"></i> </button>
        </div>
      </div>
    </section>


    <section class="container about-content" data-aos="fade-up">
      <div class="w-100" id="aboutpagecontent">
        <?php
        if (isset($fieldvalues["aboutpagecontent"]) && !empty($fieldvalues["aboutpagecontent"])) {
          echo $fieldvalues["aboutpagecontent"];
        } else {
        ?><h4>Place your heading here</h4>
          <p> <?= "\t\t" ?>Place content related here. If you want multiple headings and content only copy paste this below. </p>
          <h4>Place second heading here</h4>
          <p> <?= "\t\t" ?>If you don't want it remove this. You can also put bootstrap 5 templates here </p>
        <?php
        }

        ?>
      </div>
      <button onclick="editField('aboutpagecontent', 'code','You can also put bootstrap 5 templates here. <a target=\'__blank\' href=\'https:\\\\getbootstrap.com/docs/5.0/components/\'>Click here</a> to browse templates.','modal-xl')" class="btn btn-edit-sm btn-primary" style="top: 60px;" role="button"><i class="bi bi-pencil"></i> </button>

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
  <input type="file" accept="image/*" id="imageInput" style="display:none" />

  <!-- Edit Field Values modal -->
  <div class="modal fade" id="editFieldValues" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editFieldValuesLabel" aria-hidden="true">
    <div class="modal-dialog" id="fieldModal">
      <form class="modal-content" onsubmit="handleFieldValueSubmit(event)">
        <div class="modal-header">
          <h5 class="modal-title" id="editFieldValuesLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-1">
            <label class="form-label"></label>
            <div id="code-editor" style="height: 60vh;"></div>
            <input type="hidden" name="code" value="false">
            <input type="text" rows='3' class="form-control" id="fieldValue" placeholder="Title">
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="<?= $base_url ?>assets/vendor/aos/aos.js"></script>
  <!-- Template Main JS File -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.21.0/min/vs/loader.min.js"></script>
  <script>
    window.addEventListener("load", () => {
      AOS.init({
        duration: 1000,
        easing: "ease-in-out",
        once: true,
        mirror: false,
      });
    });
    var editFieldValues = new bootstrap.Modal(document.getElementById('editFieldValues'), {
      keyboard: false
    })
    require.config({
      paths: {
        'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.18.1/min/vs'
      }
    });
    require(['vs/editor/editor.main'], function() {
      window.editor = monaco.editor.create(document.getElementById('code-editor'), {
        value: '',
        scrollBeyondLastLine: false,
        autoIndent: true,
        formatOnPaste: true,
        formatOnType: true,
        language: 'html',
        automaticLayout: true,
        lineNumbers: "off",
        glyphMargin: false,
        theme: "vs-dark",
      });
    });

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

    function editField(fieldId, type, helpText, size = null) {
      $('#editFieldValuesLabel').html(fieldId);
      let currentText = $('#' + fieldId).html().trim();
      let parent = $('#fieldValue').parent();
      let rows = 3;
      if (size !== null) {
        $("#fieldModal").addClass(size);
        rows = 10;
      }
      parent.find('.form-label').html(helpText);
      $('#fieldValue').remove();
      if (type === 'code') {
        $("#code-editor").show();
        window.editor.setValue(currentText);
        editor.getAction('editor.action.formatDocument').run()
        $("input[name='code']").val(true)
      } else {
        $("input[name='code']").val(false)
        $("#code-editor").hide();
      }
      let field = '';
      switch (type) {
        case 'text':
          field = '<input type="text" class="form-control" id="fieldValue" value="' + currentText + '">';
          break;
        case 'code':
          field = '<input type="hidden" class="form-control" id="fieldValue">';
          break;
        case 'textarea':
          field = '<textarea class="form-control" id="fieldValue" rows="' + rows + '" >' + currentText + '</textarea>';
          break;
        default:
          field = '<input type="' + type + '" class="form-control" id="fieldValue" value="' + currentText + '">';
      }
      parent.append(field);
      $('#fieldValue').attr('name', fieldId);
      editFieldValues.show();

    }


    function handleFieldValueSubmit(e) {
      e.preventDefault();
      let fieldId = $('#fieldValue').attr('name');
      let fieldValue;
      if ($("input[name='code']").val() === 'true')
        fieldValue = window.editor.getValue();
      else
        fieldValue = $('#fieldValue').val();
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
</body>

</html>