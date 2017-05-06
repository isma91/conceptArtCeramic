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
        <p class="flow-text">Nous sommes spécialisés dans la rénovation, l'adaptation et la transformation dans tout types d'habitions.</p>
        <p class="flow-text">Fort de nos 15 années d'expérience, nous avons les capacités pour tout types de demandes, même les plus spécifiques.</p>
        <p class="flow-text">Les images ci-dessus sont des travaux réalisés par nos soins, avec un avant/après.</p>
        <p class="flow-text">Vous pouvez nous contacter via <a id="link" href="/contact">la page de contact</a>.</p>
        <p class="flow-text">Nous faisons aussi la production de <a id="link" href="/cini">çini</a>.</p>
    </div>
</div>
<?php include("footer.html"); ?>
</body>
</html>
