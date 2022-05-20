<div class="top_height"></div>

<div class="container-md mt-5 mb-5">

    <div class="row">

        <div class="col-lg-12 m-auto text-left">

            <div style="margin: 0 auto;" class="w-50">
                <h1 class="text-center mb-3 text-white"><?= constant('TITLE_PAGE_PLAN_SITE') ?></h1>
            </div>

        </div>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <div class="text-white">

        <h4>Vins</h4>

        <p class="mt-3"><b>Appellation :</b></p>

        <ul vocab="https://schema.org/" typeof="BreadcrumbList">
            <?php foreach ($appellations as $value) { ?>
                <?php if ($value['id_boisson'] == "1") { ?>
                    <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" class="text-white" href="/<?= $language ?>/appellation/1/<?= $value['id'] ?>"><span property="name"><?= $value['nom_fr_fr'] ?></a></span><meta property="position" content="1"></li>
                <?php } ?>
            <?php } ?>

        </ul>

        <p><b>Régions :</b></p>

        <ul vocab="https://schema.org/" typeof="BreadcrumbList">
            <?php foreach ($regions as $value) { ?>
                <?php if ($value['id_boisson'] == "1") { ?>
                    <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" class="text-white" href="/<?= $language ?>/region/1/<?= $value['id'] ?>"><span property="name"><?= $value['nom_fr_fr'] ?></a></span><meta property="position" content="1"></li>
                <?php } ?>
            <?php } ?>
        </ul>

        <hr>

        <h4>Champagnes</h4>

        <p class="mt-3"><b>Appellations :</b></p>

        <ul vocab="https://schema.org/" typeof="BreadcrumbList">
            <?php foreach ($appellations as $value) { ?>
                <?php if ($value['id_boisson'] == "2") { ?>
                    <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" class="text-white" href="/<?= $language ?>/appellation/2/<?= $value['id'] ?>"><span property="name"><?= $value['nom_fr_fr'] ?></span></a><meta property="position" content="1"></li>
                <?php } ?>
            <?php } ?>
        </ul>

        <p><b>Régions :</b></p>

        <ul vocab="https://schema.org/" typeof="BreadcrumbList">
            <?php foreach ($regions as $value) { ?>
                <?php if ($value['id_boisson'] == "2") { ?>
                    <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" class="text-white" href="/<?= $language ?>/region/2/<?= $value['id'] ?>"><span property="name"><?= $value['nom_fr_fr'] ?></span></a><meta property="position" content="1"></li>
                <?php } ?>
            <?php } ?>
        </ul>

    </div>

</div>