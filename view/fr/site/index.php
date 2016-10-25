<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="<?php echo $this->site["description"] ?>" />
    <title><?php echo $this->site["title"]; ?></title>
    <?php foreach ($this->css as $css) {
        echo $css . "\n";
    } foreach ($this->js as $js) {
        echo $js . "\n";
    } ?>
</head>
<body>
<?php include("menu.php"); ?>
<div class="owl-carousel owl-theme" >
    <?php
    $directory = __DIR__ . "/../../../media/img/homePage/";
    $files = scandir($directory);
    foreach ($files as $file) {
        if ($file !== "." && $file !== ".." && $file !== "index.php") {
            ?>
            <div><img src="../../media/img/homePage/<?php echo $file; ?>"></div>
            <?php
        }
    }
    ?>
</div>
<div class="container">
    <div class="row center">
        <p class="flow-text">De nos jours, l'architechture moderne a fait revivre la faïence avec des models simples et originaux.</p>
        <p class="flow-text">Nous avons une collection de qualité, dans le respect de la tradition et avec une gamme de couleur et accesoire très large.</p>
        <p class="flow-text">Notre société a pour but de faire découvrir nos oeuvres culturel et artistiques.</p>
    </div>
</div>
<?php include("footer.html"); ?>
</body>
</html>