<div id="carouselVin" class="carousel slide shadow " data-bs-ride="carousel">

    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselVin" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Image 1"></button>
    </div>

    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="<?= $static_img ?>slider/image_1.jpg" height="1080" class="d-block w-100" alt="..." style="opacity: 0.6;">
            <div class="carousel-caption d-none d-md-block">
                <h1><?= constant('MINI_DESC_2') ?></h1>
                <h2 id="decouvrir"><span><i class="fa-solid fa-chevron-right me-2"></i> <?= strtoupper(constant('DECOUVRIR')) ?></span></h2>
                <div id="decouvrir_img">
                    <img src="<?= $static_img ?>scroll.png" alt="">
                </div>
            </div>
        </div>

    </div>

</div>