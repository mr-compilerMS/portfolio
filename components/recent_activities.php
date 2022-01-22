<?php
$sql = "SELECT * FROM `activities` where active=1 order by `date` desc";
$result = $conn->query($sql);
$sql = "SELECT distinct(`category`) FROM `activities` order by `category`";
$catsresult = $conn->query($sql);
$cats = array();
while ($row = $catsresult->fetch_assoc()) {
    $cats[] = $row['category'];
}
function replaceWhiteSpace($str)
{
    return str_replace(' ', '-', $str);
}

$categories = array_map('replaceWhiteSpace', $cats);

?>
<!-- ======= Recent Activities Section ======= -->
<section id="portfolio" class="portfolio section-bg">
    <div class="container">
        <div class="section-title">
            <h2>Recent Activities</h2>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <?php
                    foreach (array_combine($categories, $cats) as $class => $value) {
                        echo '<li data-filter=".filter-' . $class . '">' . $value . '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container">

            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 portfolio-item filter-<?= replaceWhiteSpace($row['category']) ?>">
                    <div class="portfolio-wrap">
                        <img src="<?= $base_url ?><?= $row['imgUrl'] ?>" class="img-thumbnail" width="100%" height="100%" alt="" />
                        <div class="portfolio-info">
                            <h4><?= $row['title'] ?> </h4>
                            <p><?= $row['date'] ?></p>
                            <div class="portfolio-links">
                                <a href="<?= $base_url ?><?= $row['imgUrl'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" data-desc-position="right" data-height="100vh" data-width="100%" data-title="<?= $row['title'] ?>" data-description="<?= $row['description'] ?>">Know More</a>

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
<!-- End Recent Activities Section -->