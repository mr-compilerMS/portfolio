 <?php

    $sql = "SELECT * FROM `carousel` ORDER BY position";
    $result = $conn->query($sql);
    if (!isset($result) || !isset($result->num_rows)) return;
    if ($result->num_rows > 0) {
    ?>

     <!-- ======= Hero Section ======= -->
     <section id="hero">
         <div class="hero-container">
             <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                 <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                 <div class="carousel-inner" role="listbox">
                     <?php
                        while ($row = $result->fetch_assoc()) {
                        ?>
                         <div class="carousel-item<?php if ($row['position'] == 1) echo " active" ?>" id="carousel-item<?= $row['id'] ?>" style="background-image: url('<?= $base_url ?><?= $row["imgUrl"] ?>')">
                             <div class="carousel-container">
                                 <div class="carousel-content container">
                                     <h2 class="animate__animated animate__fadeInDown">
                                         <?= $row["title"] ?>
                                     </h2>
                                     <p class="animate__animated animate__fadeInUp">
                                         <?= $row["content"] ?>
                                     </p>
                                 </div>
                             </div>
                         </div>
                     <?php
                        }
                        ?>
                 </div>

                 <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                     <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                 </a>
                 <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                     <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                 </a>
             </div>
         </div>
     </section>
     <!-- End Hero -->

 <?php
    } else {
    }

    // $conn->close();
    ?>