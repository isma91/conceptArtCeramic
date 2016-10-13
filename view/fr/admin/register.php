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
        <h2 class="title">Remplissez le formulaire pour ajouter un nouvel administrateur</h2>
    </div>
    <div class="row failed">
        <?php if ($this->error !== null) { echo $this->error; } ?>
    </div>
    <div class="row success">
        <?php if ($this->success !== null) { echo $this->success; } ?>
    </div>
    <form action="/admin/register" method="post" class="row">
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">face</i>
                <input id="lastname" name="lastname" type="text" value="<?php echo $this->lastname ?>">
                <label for="lastname">Nom de Famille</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">face</i>
                <input id="firstname" name="firstname" type="text" value="<?php echo $this->firstname ?>">
                <label for="firstname">Prénom</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">face</i>
                <input id="login" name="login" type="text" value="<?php echo $this->login ?>">
                <label for="login">Pseudo</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input id="email" name="email" type="email" value="<?php echo $this->email ?>">
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">vpn_key</i>
                <input id="pass" name="password" type="password">
                <label for="pass">Mot de passe</label>
            </div>
        </div>
        <div class="row endButton">
            <button class="btn waves-effect" type="submit">Ajouter admin</button>
        </div>
    </form>
</div>
</body>
</html>