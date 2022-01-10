<?php

$sql = "SELECT * FROM `opinions` where active=1";
$result = $conn->query($sql);
if (!isset($result) || !isset($result->num_rows)) return;
if ($result->num_rows > 0) {
?>

    <!-- ======= Opinions Section ======= -->
    <section class="section-bg">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="section-title">
                <h2>Opinions</h2>
            </div>
            <div class="owl-carousel owl-theme mt-1">
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="owl-item" id="opinion-<?= $row["id"] ?>">
                        <div class="card border border-primary shadow">
                            <div class="row">
                                <div class="col-12 col-sm-3 d-flex justify-content-center">
                                    <img class="rounded-circle opinion-client" src="<?= $base_url ?><?= $row["imgUrl"] ?>" alt="" />
                                </div>
                                <div class="col-12 col-sm-9 mt-4 mt-sm-1">
                                    <div class="name col-12 text-center text-sm-start h6 fw-bold">
                                        <?= $row["name"] ?>
                                    </div>

                                    <div class="testimonial fw-light">
                                        <?= $row["opinion"] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- ======= Opinions Section ======= -->

<?php
} else {
}

$conn->close();
?>