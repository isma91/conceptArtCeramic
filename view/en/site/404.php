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
    <style>
        html, body {
            width: 100%;
            height: 100%;
            background: url(../../../media/img/404.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        #div {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="mui-panel" id="div">
        <h1 class="title">Page not found</h1>
        <button class="btn waves-effect" onclick="window.history.back()">Go Back</button>
        <a class="btn waves-effect" href="/">Home Page</a>
    </div>
</div>
<?php include("footer.html"); ?>
</body>
</html>