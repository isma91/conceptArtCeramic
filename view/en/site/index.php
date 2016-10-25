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
        <p class="flow-text">Today, modern architecture has revived faience with simple and original models.</p>
        <p class="flow-text">We have a quality collection, with respect for tradition and with a range of color and broad accessory.</p>
        <p class="flow-text">Our company's aim is to discover our cultural and artistic works.</p>
    </div>
</div>
<?php include("footer.html"); ?>
</body>
</html>