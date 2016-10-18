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
    <div class="row mui-panel">
        <h2 class="title">Bonjour <?php echo $this->firstname; ?> <?php echo $this->lastname; ?></h2>
    </div>
    <div class="row failed">
        <?php if ($this->error !== null) { echo $this->error; } ?>
    </div>
    <div class="row success">
        <?php if ($this->success !== null) { echo $this->success; } ?>
    </div>
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3"><a href="#contact">Message Contact</a></li>
                <li class="tab col s3"><a href="#devis">Message Devis</a></li>
            </ul>
        </div>
        <div id="contact" class="row">
            <p class="title">Messages pour Contact</p>
            <table>
                <thead>
                <tr>
                    <th data-field="name">Nom</th>
                    <th data-field="email">Email</th>
                    <th data-field="tel">Tel</th>
                    <th data-field="message">Message</th>
                    <th data-field="date">Date</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (count($this->formsNull) == 0) {
                    ?>
                    <tr>
                        <td>Pas de Message Reçus</td>
                    </tr>
                    <?php
                } else {
                    foreach ($this->formsNull as $array) {
                        ?>
                        <tr>
                            <td><?php echo $array["name"]; ?></td>
                            <td><?php echo $array["email"]; ?></td>
                            <td><?php echo $array["tel"]; ?></td>
                            <td><?php echo $array["message"]; ?></td>
                            <td><?php echo $array["date"]; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
        <div id="devis" class="row">
            <p class="title">Messages pour Devis</p>
            <table>
                <thead>
                <tr>
                    <th data-field="name">Nom</th>
                    <th data-field="email">Email</th>
                    <th data-field="tel">Tel</th>
                    <th data-field="message">Message</th>
                    <th data-field="product">Produit</th>
                    <th data-field="date">Date</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (count($this->formsNotNull) == 0) {
                    ?>
                    <tr>
                        <td>Pas de Message Reçus</td>
                    </tr>
                    <?php
                } else {
                    $field = $_SESSION["lang"] . "Name";
                    foreach ($this->formsNotNull as $array) {
                        ?>
                        <tr>
                            <td><?php echo $array["name"]; ?></td>
                            <td><?php echo $array["email"]; ?></td>
                            <td><?php echo $array["tel"]; ?></td>
                            <td><?php echo $array["message"]; ?></td>
                            <td><a class="btn waves-effect" href="/product/<?php echo $array["idProduct"]; ?>"><?php echo $array[$field]; ?></a></td>
                            <td><?php echo $array["date"]; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>