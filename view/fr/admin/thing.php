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
<?php include("adminMenu.php"); ?>
<div class="container">
    <div class="row mui-panel" id="the_menu">
        <h2 class="title">Voici les <?php echo $this->thing["title"]; ?> enregistrer</h2>
    </div>
    <div class="row failed">
        <?php if ($this->error !== null) { echo $this->error; } ?>
    </div>
    <div class="row success">
        <?php if ($this->success !== null) { echo $this->success; } ?>
    </div>
    <ul class="collection">
        <?php
        if ($this->thing["slug"] !== "product") {
            if (count($this->thing["thing"]) == 0) {
                ?>
                <li class="collection-item">Pas de <?php echo $this->thing["title"]; ?> enregistrer</li>
                <?php
            } else {
                foreach ($this->thing["thing"] as $id => $name) {
                    ?>
                    <li class="collection-item center"><?php echo $name; ?><a class="btn waves-effect right" href="/admin/update/<?php echo $this->thing["slug"]; ?>/<?php echo $id; ?>">Modifier</a></li>
                    <?php
                }
            }
        }
        ?>
    </ul>
    <?php
    if ($this->thing["slug"] === "product") {
        if (count($this->thing["thing"]) != 0) {
            foreach ($this->thing["thing"] as $product) {
                $img = explode("|", $product["img"])[0];
                $field = $_SESSION["lang"] . "Name";
                ?>
                <div class="col s12 m8 l6 ">
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <div class="row valign-wrapper">
                            <div class="col s2">
                                <img src="../../media/img/product/<?php echo $product["id"] . "/" . $img ?>" class="circle responsive-img">
                            </div>
                            <div class="col s10">
                                <span class="black-text"><?php echo $product[$field]; ?></span>
                            </div>
                            <div class="col right">
                                <a class="btn waves-effect" href="/admin/update/product/<?php echo $product["id"]; ?>">Modifier</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <p class="title">Pas de Produit</p>
            <?php
        }
    }
    ?>
</div>
</body>
</html>