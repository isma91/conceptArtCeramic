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
<div class="container">
    <div class="row mui-panel" id="the_menu">
        <div class="right" id="language"><span class="language">EN</span> | <span class="language">FR</span></div>
        <h1 class="title">Panel admin</h1>
    </div>
    <div class="row failed">
        <?php if ($this->error !== null) { echo $this->error; } ?>
    </div>
    <div class="row success">
        <?php if ($this->success !== null) { echo $this->success; } ?>
    </div>
    <form action="/admin" method="post" class="row">
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">face</i>
                <input id="loginEmail" name="loginEmail" type="text" value="<?php echo $this->loginEmail; ?>">
                <label for="loginEmail">Pseudo ou Email</label>
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
            <button class="btn waves-effect" type="submit">Connexion</button>
        </div>
    </form>
</div>
</body>
</html>