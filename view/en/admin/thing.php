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
        <h2 class="title">Here are all <?php echo $this->thing["title"]; ?> added</h2>
    </div>
    <div class="row failed">
        <?php if ($this->error !== null) { echo $this->error; } ?>
    </div>
    <div class="row success">
        <?php if ($this->success !== null) { echo $this->success; } ?>
    </div>
    <ul class="collection">
        <?php
        if (count($this->thing["thing"]) === 0) {
            ?>
            <li class="collection-item">No <?php echo $this->thing["title"]; ?> added yet</li>
            <?php
        } else {
            foreach ($this->thing["thing"] as $id => $name) {
                ?>
                <li class="collection-item center"><?php echo $name; ?><a class="btn waves-effect right" href="/admin/update/<?php echo $this->thing["slug"]; ?>/<?php echo $id; ?>">Update</a></li>
                <?php
            }
        }
        ?>
    </ul>
</div>
</body>
</html>