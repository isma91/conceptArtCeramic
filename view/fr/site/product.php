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
    <div class="row failed">
        <?php if ($this->error !== null) { echo $this->error; } ?>
    </div>
    <div class="row success">
        <?php if ($this->success !== null) { echo $this->success; } ?>
    </div>
    <div class="row">
        <?php
        if(count($this->product) != 0) {
        ?>
        <div class="row mui-panel">
            <div class="row">
                <h1 class="title"><?php echo $this->product["name"]; ?></h1>
            </div>
            <div class="row">
                <ul class="pgwSlideshow">
                    <?php
                    foreach ($this->product["img"] as $img) {
                        ?>
                        <li><img src="../../../media/img/product/<?php echo $this->product["id"] . "/" . $img ; ?>" alt="<?php echo $this->product["name"]; ?>"></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <select id="material">
                        <?php
                        foreach ($this->product["material"] as $material) {
                            ?>
                            <option value="<?php echo $material; ?>"><?php echo $material; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label for="material">Matériaux Disponible</label>
                </div>
                <div class="input-field col s6">
                    <select id="size">
                        <?php
                        foreach ($this->product["size"] as $size) {
                            ?>
                            <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label for="size">Tailles Disponible</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s6"><a href="#usage">Utilisation</a></li>
                        <li class="tab col s6"><a href="#devis">Demander un Devis</a></li>
                    </ul>
                </div>
                <div id="usage" class="col s12">
                    <div class="mui-panel">
                        <ul class="collection">
                            <?php
                            foreach ($this->product["usage"] as $usage) {
                                ?>
                                <li class="collection-item center"><?php echo stripslashes($usage); ?></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div id="devis" class="col s12">
                    <form action="/product/<?php echo $this->product["id"]; ?>" method="post" class="row">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">face</i>
                                <input id="name" name="name" type="text" value="<?php echo $this->array["name"]; ?>">
                                <label for="name">Nom</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">email</i>
                                <input id="email" name="email" type="email" value="<?php echo $this->array["email"]; ?>">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">phone</i>
                                <input id="phone" name="tel" type="tel" value="<?php echo $this->array["tel"]; ?>">
                                <label for="phone">Numéro de Téléphone</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">message</i>
                                <textarea id="message" name="message" class="materialize-textarea"><?php echo $this->array["message"]; ?></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="row endButton">
                            <button class="btn waves-effect" type="submit">Envoyer <i class="material-icons right">send</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
<?php include("footer.html"); ?>
</body>
</html>