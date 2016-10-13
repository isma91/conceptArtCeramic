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
    <div><img src="../../media/img/1.jpg"></div>
    <div><img src="../../media/img/2.jpg"></div>
    <div><img src="../../media/img/3.jpg"></div>
    <div><img src="../../media/img/4.jpg"></div>
</div>
<div class="container"></div>
</body>
</html>