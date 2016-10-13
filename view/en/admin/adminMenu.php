<div class="container">
    <div class="row info">
        <?php if ($this->site["info"] !== null) { echo $this->site["info"]; } ?>
    </div>
</div>
<!-- Dropdown content -->
<ul id="menuDropdownUpdate" class="dropdown-content">
    <li><a href="/admin/update/info">Informations on the Site</a></li>
    <li><a href="/admin/update/product">Product</a></li>
    <li><a href="/admin/update/category">Category</a></li>
    <li><a href="/admin/update/material">Material</a></li>
    <li><a href="/admin/update/color">Color</a></li>
    <li><a href="/admin/update/size">Size</a></li>
    <li><a href="/admin/update/usage">Usage</a></li>
</ul>
<ul id="menuDropdownAdd" class="dropdown-content">
    <li><a href="/admin/add/product">Product</a></li>
    <li><a href="/admin/add/category">Category</a></li>
    <li><a href="/admin/add/material">Material</a></li>
    <li><a href="/admin/add/color">Color</a></li>
    <li><a href="/admin/add/size">Size</a></li>
    <li><a href="/admin/add/usage">Usage</a></li>
</ul>
<!-- Menu -->
<nav class="navbar-fixed">
    <div class="nav-wrapper">
        <a href="/admin/panel" class="brand-logo"><img src="<?php echo $this->img["logo"] ?>" title="logo" alt="logo" class="responsive-img left" id="imgLogo" /></a>
        <a href="#" data-activates="menuMobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="/">Home Site</a></li>
            <li><a href="/admin/panel">Home Panel</a></li>
            <li><a href="/admin/register">Add Admin</a></li>
            <li><a class="dropdown-button-menu" href="/admin/update/product" data-activates="menuDropdownUpdate">Update</a></li>
            <li><a class="dropdown-button-menu" href="/admin/add/product" data-activates="menuDropdownAdd">Add</a></li>
            <li><a class="language" href="">FR</a></li>
            <li><a class="language" href="">EN</a></li>
            <li><a id="logout" href="" token="<?php echo $_SESSION["token"]; ?>">Logout</a></li>
        </ul>
        <ul class="side-nav" id="menuMobile">
            <li><a href="/">Home Site</a></li>
            <li><a href="/admin/panel">Home Panel</a></li>
            <li><a href="/admin/register">Add Admin</a></li>
            <li><a class="dropdown-button-menu" href="/admin/update/product">Update</a></li>
            <li><a class="dropdown-button-menu" href="/admin/add/product">Add</a></li>
            <li><a class="language" href="">FR</a></li>
            <li><a class="language" href="">EN</a></li>
            <li><a id="logout" href="" token="<?php echo $_SESSION["token"]; ?>">Logout</a></li>
        </ul>
    </div>
</nav>