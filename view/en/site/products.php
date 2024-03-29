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
        if ($this->func == "categories") {
            foreach ($this->categoriesMaterialsProducts as $category => $array) {
                if (count($array) != 0 && $array["count"] != 0) {
                    ?>
                    <div class="col s12 m4 l4">
                        <div class="card">
                            <div class="card-image">
                                <a class="productImg" href="/products/<?php echo $array["slug"]; ?>" ><img class="responsive-img" src="../../media/img/product/<?php echo $array["id"] . "/" . $array["img"] ?>"></a>
                            </div>
                            <div class="card-content">
                                <p><span class="categoryName"><?php echo $category; ?></span> <span class="productCount"><?php echo "(" . $array["count"] . ")";?></span></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        } elseif ($this->func == "materials") {
            foreach ($this->categoriesMaterialsProducts as $material => $array) {
                if (count($array) != 0 && $array["count"] != 0) {
                    ?>
                    <div class="col s12 m4 l4">
                        <div class="card">
                            <div class="card-image">
                                <a class="productImg" href="/products/<?php echo $array["categorySlug"] . "/" . $array["slug"]; ?>" ><img class="responsive-img" src="../../media/img/product/<?php echo $array["product"]["id"] . "/" . $array["product"]["img"] ?>"></a>
                            </div>
                            <div class="card-content">
                                <p><span class="materialName"><?php echo $material; ?></span> <span class="productCount"><?php echo "(" . $array["count"] . ")";?></span></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        } elseif ($this->func == "products") {
            if (count($this->categoriesMaterialsProducts) != 0) {
                foreach ($this->categoriesMaterialsProducts as $product) {
                    ?>
                    <div class="col s12 m4 l4">
                        <div class="card">
                            <div class="card-image">
                                <a class="productImg" href="/product/<?php echo $product["id"]; ?>" ><img class="responsive-img" src="../../media/img/product/<?php echo $product["id"] . "/" . $product["img"] ?>"></a>
                            </div>
                            <div class="card-content">
                                <p><span class="productName"><?php echo $product["name"]; ?></span></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="col s12 m4 l4">
                    <div class="row">
                        <p class="title">Pas de Produit</p>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
<?php include("footer.html"); ?>
</body>
</html>
