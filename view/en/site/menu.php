<!-- Dropdown content -->
<ul id="menuDropdownGroundWall" class="dropdown-content">
    <li><a href="/products/groundWall/ceramic">Ceramic</a></li>
    <li><a href="/products/groundWall/marble">Marble</a></li>
    <li><a href="/products/groundWall/granite">Granite</a></li>
    <li><a href="/products/groundWall/stone">Natural Stone</a></li>
</ul>
<ul id="menuDropdownArchitecture" class="dropdown-content">
    <li><a href="/products/architecture/ceramic">Ceramic</a></li>
    <li><a href="/products/architecture/marble">Marble</a></li>
    <li><a href="/products/architecture/granite">Granite</a></li>
</ul>
<ul id="menuDropdownDecoration" class="dropdown-content">
    <li><a href="/products/decoration/ceramic">Ceramic</a></li>
    <li><a href="/products/decoration/marble">Marble</a></li>
</ul>
<ul id="menuDropdownProduct" class="dropdown-content">
    <li><a class="dropdown-button-submenu" href="/products/groundWall" data-activates="menuDropdownGroundWall">Ground & Wall</a></li>
    <li><a class="dropdown-button-submenu" href="/products/architecture" data-activates="menuDropdownArchitecture">Architecture</a></li>
    <li><a class="dropdown-button-submenu" href="/products/decoration" data-activates="menuDropdownDecoration">Decoration</a></li>
</ul>
<!-- Menu -->
<nav class="navbar-fixed">
    <div class="nav-wrapper">
        <a href="/" class="brand-logo"><img src="<?php echo $this->img["logo"] ?>" title="logo" alt="logo" class="responsive-img left" id="imgLogo" /></a>
        <a href="#" data-activates="menuMobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="/">Home</a></li>
            <li><a href="/about">Why Choose the Tile ?</a></li>
            <li><a class="dropdown-button-menu" href="/products" data-activates="menuDropdownProduct">Our Products</a></li>
            <li><a href="/contact">Contact Us</a></li>
            <li><a class="language" href="">FR</a></li>
            <li><a class="language" href="">EN</a></li>
        </ul>
        <ul class="side-nav" id="menuMobile">
            <!-- side nav quand ecran trop petit... A ne pas faire comme le grand menu-->
        </ul>
    </div>
</nav>