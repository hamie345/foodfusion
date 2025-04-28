<!-- Hero Section (Carousel) -->
<section class="hero">
    <div class="carousel">
        <div class="carousel-item" style="background-image: url('assets/images/bg2.jpg')">
            <div class="carousel-content">
                <h2><?= $heading ?></h2>
                <p><?= $description ?></p>
                <?php
                require './assets/partials/badge.php';
                ?>
            </div>
        </div>
    </div>
</section>