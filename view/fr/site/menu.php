<!-- Dropdown content -->
<ul id="menuDropdownGroundWall" class="dropdown-content">
    <li><a href="/products/groundWall/ceramic">Céramique</a></li>
    <li><a href="/products/groundWall/marble">Marbre</a></li>
    <li><a href="/products/groundWall/granite">Granit</a></li>
    <li><a href="/products/groundWall/stone">Pierre Naturel</a></li>
</ul>
<ul id="menuDropdownArchitecture" class="dropdown-content">
    <li><a href="/products/architecture/ceramic">Céramique</a></li>
    <li><a href="/products/architecture/marble">Marbre</a></li>
    <li><a href="/products/architecture/granite">Granit</a></li>
</ul>
<ul id="menuDropdownDecoration" class="dropdown-content">
    <li><a href="/products/decoration/ceramic">Céramique</a></li>
    <li><a href="/products/decoration/marble">Marbre</a></li>
</ul>
<ul id="menuDropdownProduct" class="dropdown-content">
    <li><a class="dropdown-button-submenu" href="/products/groundWall" data-activates="menuDropdownGroundWall">Sol & Mur</a></li>
    <li><a class="dropdown-button-submenu" href="/products/architecture" data-activates="menuDropdownArchitecture">Architecture</a></li>
    <li><a class="dropdown-button-submenu" href="/products/decoration" data-activates="menuDropdownDecoration">Décoration</a></li>
</ul>
<!-- Menu -->
<nav class="navbar-fixed">
    <div class="nav-wrapper">
        <a href="/" class="brand-logo"><img src="<?php echo $this->img["logo"] ?>" title="logo" alt="logo" class="responsive-img left" id="imgLogo" /></a>
        <a href="#" data-activates="menuMobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="/">Accueil</a></li>
            <li><a href="/about">Pour Choisir Le Çini ?</a></li>
            <li><a class="dropdown-button-menu" href="/products" data-activates="menuDropdownProduct">Nos Produits</a></li>
            <li><a href="/contact">Nous Contacter</a></li>
            <li><a class="language" href="">FR</a></li>
            <li><a class="language" href="">EN</a></li>
        </ul>
        <ul class="side-nav" id="menuMobile">
            <!-- side nav quand ecran trop petit... A ne pas faire comme le grand menu-->
        </ul>
    </div>
</nav>