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
<div class="container">
    <div class="row">
        <?php
        var_dump($this->product);
        /*if(count($this->product) === 0) {
            ?>
            <div class="col s12 m4 l3">
                <div class="card">
                    <div class="card-image">
                        <a class="productImg" href="/product/<?php echo $product["id"]; ?>" ><img class="responsive-img" src="../../media/img/product/<?php echo $product["id"] . "/" . $product["img"] ?>"></a>
                        <span class="card-title"><?php echo $product["name"]; ?></span>
                    </div>
                    <div class="card-content">
                        <p><span class="categoryName"><?php echo $product["name"]; ?></p>
                    </div>
                </div>
            </div>
            <?php
        }*/
        ?>
    </div>
</div>
</body>
</html>