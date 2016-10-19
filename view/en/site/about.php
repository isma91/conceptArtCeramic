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
        <h1 class="center">Why the Çini ?</h1>
    </div>
    <div class="row mui-panel">
        <p class="title">History</p>
        <p class="flow-text">The Çini (Iznik ceramics) means the output from the middle of the fifteenth century in the city of İznik (formerly Nicaea) in Turkey.</p>
        <p class="flow-text">This art has been used in Central Asia for over a thousand years in the palaces, temples and other places of worship.</p>
    </div>
    <div class="row mui-panel center">
        <p class="title">How it's made</p>
        <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/7Nxyvb43tPY" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <div class="row mui-panel">
        <p class="title"></p>
        <p class="flow-text">It is an art that is still made by hand according to ancient techniques with bright colors that keep their natural support manicured grounds.</p>
    </div>
</div>
<?php include("footer.html"); ?>
</body>
</html>