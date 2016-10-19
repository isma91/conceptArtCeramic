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
<style>
</style>
<body>
<?php include("menu.php"); ?>
<div class="container">
    <div class="row">
        <h1 class="center">Pourquoi le Çini ?</h1>
    </div>
    <div class="row mui-panel">
        <p class="title">Historique</p>
        <p class="flow-text">Le Çini (céramique d'Iznik) désigne les productions réalisées à partir du milieu du xve siècle dans la ville d'İznik (anciennement Nicée) en Turquie.</p>
        <p class="flow-text">Cette art a été utiliser en Asie central pendant plus de mille ans dans les palais, temples et divers lieux de culte.</p>
    </div>
    <div class="row mui-panel center">
        <p class="title">Particularités et Fabrication</p>
        <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/7Nxyvb43tPY" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <div class="row mui-panel">
        <p class="title"></p>
        <p class="flow-text">C'est un art qui est toujours fabriquer à la main selon des techniques ancestrale avec des couleurs vives qui garde leurs naturels appuyer de motifs impeccables.</p>
    </div>
</div>
<?php include("footer.html"); ?>
</body>
</html>