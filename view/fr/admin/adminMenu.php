<div class="container">
    <div class="row info">
        <?php if ($this->site["info"] !== null) { echo $this->site["info"]; } ?>
    </div>
</div>
<!-- Dropdown content -->
<ul id="menuDropdownUpdate" class="dropdown-content">
    <li><a href="/admin/update/info">Informations sur le site</a></li>
    <li><a href="/admin/update/product">Produit</a></li>
    <li><a href="/admin/update/category">Catégorie</a></li>
    <li><a href="/admin/update/material">Matériaux</a></li>
    <li><a href="/admin/update/color">Couleur</a></li>
    <li><a href="/admin/update/size">Taille</a></li>
    <li><a href="/admin/update/usage">Utilisation</a></li>
</ul>
<ul id="menuDropdownAdd" class="dropdown-content">
    <li><a href="/admin/add/product">Produit</a></li>
    <li><a href="/admin/add/category">Catégorie</a></li>
    <li><a href="/admin/add/material">Matériaux</a></li>
    <li><a href="/admin/add/color">Couleur</a></li>
    <li><a href="/admin/add/size">Taille</a></li>
    <li><a href="/admin/add/usage">Utilisation</a></li>
</ul>
<!-- Menu -->
<nav class="navbar-fixed">
    <div class="nav-wrapper">
        <a href="/admin/panel" class="brand-logo"><img src="<?php echo $this->img["logo"] ?>" title="logo" alt="logo" class="responsive-img left" id="imgLogo" /></a>
        <a href="#" data-activates="menuMobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="/">Accueil Site</a></li>
            <li><a href="/admin/panel">Accueil Panel</a></li>
            <li><a href="/admin/register">Ajouter Admin</a></li>
            <li><a class="dropdown-button-menu" href="/admin/update/product" data-activates="menuDropdownUpdate">Modifer</a></li>
            <li><a class="dropdown-button-menu" href="/admin/add/product" data-activates="menuDropdownAdd">Ajouter</a></li>
            <li><a class="language" href="">FR</a></li>
            <li><a class="language" href="">EN</a></li>
            <li><a id="logout" href="" token="<?php echo $_SESSION["token"]; ?>">Déconnection</a></li>
        </ul>
        <ul class="side-nav" id="menuMobile">
            <!-- side nav quand ecran trop petit... A ne pas faire comme le grand menu-->
        </ul>
    </div>
</nav>