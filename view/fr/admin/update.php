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
        <h2 class="title">Remplissez le formulaire pour Modifier <?php echo $this->thing["title"] . " " . $this->thing["name"]; ?></h2>
    </div>
    <div class="row failed">
        <?php if ($this->error !== null) { echo $this->error; } ?>
    </div>
    <div class="row success">
        <?php if ($this->success !== null) { echo $this->success; } ?>
    </div>
    <form action="/admin/update/<?php echo $this->thing["slug"] . "/" . $this->thing["id"]; ?>" method="post" class="row" enctype="multipart/form-data">
        <?php
        if ($this->thing["slug"] === "info") {
            ?>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">web_asset</i>
                    <input id="title" type="text" name="title" value="<?php echo $this->site["title"]; ?>">
                    <label for="title">Titre du Site</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">web</i>
                    <input id="description" type="text" name="description" value="<?php echo $this->site["description"]; ?>">
                    <label for="description">Description du Site</label>
                </div>
            </div>
            <div class="row">
                <label>Site en Maintenance: </label>
                <div class="switch">
                    <label>
                        Off
                        <input type="checkbox" name="maintenance" id="maintenance">
                        <span class="lever"></span>
                        On
                    </label>
                </div>
            </div>
            <?php
        } elseif ($this->thing["slug"] === "product") {
            ?>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">face</i>
                    <input id="frName" type="text" name="frName" value="<?php echo $this->thing["product"]["frName"]; ?>">
                    <label for="frName">Nom en Français</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">face</i>
                    <input id="enName" type="text" name="enName" value="<?php echo $this->thing["product"]["enName"]; ?>">
                    <label for="enName">Nom en Anglais</label>
                </div>
            </div>
            <?php
            $selected = array();
            $notSelected = array();
            foreach ($this->thing["thing"] as $type => $array) {
                foreach ($array as $id => $name) {
                    foreach ($this->thing["product"][$type] as $product) {
                        if ($name === $product) {
                            $selected[$type][$id] = $name;
                        }
                    }
                    $notSelected[$type] = array_diff($array, $selected[$type]);
                }
            }
            foreach ($selected as $type => $array) {
                ?>
                <div class="row">
                    <div class="input-field col s12">
                        <select name="<?php echo $type; ?>[]" multiple>
                            <?php
                            foreach ($array as $id => $name) {
                                ?>
                                <option value="<?php echo $id; ?>" selected><?php echo $name; ?></option>
                                <?php
                            }
                            foreach ($notSelected[$type] as $id => $name) {
                                ?>
                                <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label><?php echo $this->thing["label"][$type][$_SESSION["lang"]]; ?></label>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="row">
                <label>Ajouter Image ?</label>
                <div class="switch">
                    <label>
                        Off
                        <input type="checkbox" name="addImg" id="addImg">
                        <span class="lever"></span>
                        On
                    </label>
                </div>
            </div>
            <div id="imgField"></div>
            <div class="row">
                <p class="title">Séléctionner les images que vous voulez garder</p>
                <?php
                foreach($this->thing["product"]['img'] as $img) {
                    $pathinfo = pathinfo("../../../media/img/product/" . $this->thing["product"]["id"] . "/" . $img);
                    $picture = $pathinfo["filename"] . "/" . $pathinfo["extension"];
                    ?>
                    <div class="left">
                        <p>
                            <img src="../../../media/img/product/<?php echo $this->thing["product"]["id"] . "/" . $img; ?>" style="width: 50%" class="oldImg" checkbox="<?php echo "oldImg_" . $img; ?>" />
                            <input type="checkbox" class="filled-in" id="<?php echo "oldImg_" . $img; ?>" name="<?php echo "oldImg_" . $picture; ?>"  checked/>
                            <label for="<?php echo "oldImg_" . $img; ?>"><?php echo $img; ?></label>
                        </p>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        } else {
            ?>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">label</i>
                    <input id="<?php echo $this->thing["slug"]; ?>" name="<?php echo $this->thing["slug"]; ?>" type="text" value="<?php echo $this->thing[$_SESSION["lang"]]; ?>">
                    <label for="<?php echo $this->thing["slug"]; ?>"><?php echo $this->thing["title"]; ?></label>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="row endButton">
            <button class="btn waves-effect" type="submit">Modifier <?php echo $this->thing["title"]; ?></button>
        </div>
    </form>
    <div class="row endButton">
        <a class="btn waves-effect" href="/admin/update/<?php echo $this->thing["slug"]; ?>">Retour</a>
    </div>
</div>
</body>
</html>