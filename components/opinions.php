<?php
$sql = "SELECT * FROM `opinions` where active=1";
$result = $conn->query($sql);
?>

<!-- ======= Opinions Section ======= -->
<section class="section-bg">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="section-title">
            <h2>Opinions</h2>
        </div>
        <div class="owl-carousel owl-theme mt-1">

            <?php
            if (!isset($result) || !isset($result->num_rows)) return;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="owl-item h-100 w-100" id="opinion-<?= $row["id"] ?>">
                        <div class="card h-100 border border-primary shadow">
                            <div class="row h-100">
                                <div class="col-12 col-sm-3 d-flex justify-content-center h-100">
                                    <img class="rounded-circle opinion-client" src="<?= $base_url ?><?= $row["imgUrl"] ?>" alt="" />
                                </div>
                                <div class="col-12 col-sm-9 mt-4 mt-sm-1 h-100">
                                    <div class="name col-12 text-center text-sm-start h6 fw-bold opinion-client-name">
                                        <?= $row["name"] ?>
                                    </div>

                                    <div class="testimonial fw-light opinion-client-opinion">
                                        <?= $row["opinion"] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            } else {
            }
            ?>
        </div>
    </div>
</section>
<!-- ======= Opinions Section ======= -->


<script>
    $(document).ready(function() {
        var silder = $(".owl-carousel");
        silder.owlCarousel({
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            items: <?= $result->num_rows ?>,
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