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
<ul class="pgwSlideshow">
<?php
    $directory = __DIR__ . "/../../../media/img/homePage/";
    $files = scandir($directory);
    foreach ($files as $file) {
        if ($file !== "." && $file !== ".." && $file !== "index.php") {
            ?>
            <li><img src="../../media/img/homePage/<?php echo $file; ?>"></li>
            <?php
        }
    }
    ?>
</ul>
<div class="container">
    <div class="row center">
        <p class="flow-text">We listen to you from conception to realization, we put at your disposal our expertise and our skills for all your requests concerning the main work and the second work.</p>
        <p class="flow-text">We guarantee you a clean work and deadlines always respected.</p>
        <p class="flow-text">The pictures above are done by us, with a before / after.</p>
        <p class="flow-text">You can contact us via <a id="link" href="/contact">the contact page</a>.</p>
        <p class="flow-text">We also produce <a id="link" href="/cini">çini</a>.</p>
    </div>
</div>
<?php include("footer.html"); ?>
</body>
</html>
