<!-- Dropdown content -->
<?php
$bdd = new \model\Bdd();
$field = $_SESSION["lang"] . "Name";
$materials = $bdd->select("material", array("*"));
$categories = $bdd->select("category", array("*"));
?>
<ul id="menuDropdownProduct" class="dropdown-content">
    <?php
    foreach ($categories as $category) {
        $dataActivates = "menuDropdown" . ucfirst($category["slug"]);
        ?>
        <li><a class="dropdown-button-submenu" href="/products/<?php echo $category["slug"]; ?>" data-activates="<?php echo $dataActivates; ?>"><?php echo $category[$field]; ?></a></li>
        <?php
    }
    ?>
</ul>
<?php
foreach ($categories as $category) {
    $dataActivates = "menuDropdown" . ucfirst($category["slug"]);
    ?>
    <ul id="<?php echo $dataActivates; ?>" class="dropdown-content">
        <?php
        foreach ($materials as $material) {
            ?>
            <li><a href="/products/<?php echo $category["slug"] . "/" . $material["slug"]; ?>"><?php echo $material[$field]; ?></a></li>
            <?php
        }
        ?>
    </ul>
    <?php
}
?>
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
            <li><a href="/">Home</a></li>
            <li><a href="/about">Why Choose the Çini ?</a></li>
            <li><a class="dropdown-button-menu" href="/products">Our Products</a></li>
            <li><a href="/contact">Contact Us</a></li>
            <li><a class="language" href="">FR</a></li>
            <li><a class="language" href="">EN</a></li>
        </ul>
    </div>
</nav>
<script type="text/javascript">
    $(document).ready(function () {
        $(".button-collapse").sideNav();
    });
</script>