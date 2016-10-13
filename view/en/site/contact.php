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
<?php include("menu.php"); ?>
<div class="container">
    <div class="row">
        <div class="col s12 m9 l10">
            <div id="contact" class="section scrollspy">
                <div class="row">
                    <p class="title">Contact</p>
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <i class="material-icons medium">location_city</i>
                            <span class="title">Les Ulis</span>
                        </li>
                        <li class="collection-item avatar">
                            <i class="material-icons medium">phone</i>
                            <span class="title">0123456789</span>
                        </li>
                        <li class="collection-item avatar">
                            <i class="material-icons medium">email</i>
                            <span class="title"><a href="mailto:conceptceram@yahoo.com">conceptceram@yahoo.com</a></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="write" class="section scrollspy">
                <p class="title">Write Us</p>
                <form action="/contact" method="post" class="row">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">face</i>
                            <input id="name" name="name" type="text" value="<?php echo $this->name; ?>">
                            <label for="name">Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="email" name="email" type="email" value="<?php echo $this->email; ?>">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">phone</i>
                            <input id="phone" name="tel" type="tel" value="<?php echo $this->tel; ?>">
                            <label for="phone">Phone Number</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">message</i>
                            <textarea id="message" name="message" class="materialize-textarea"><?php echo $this->message; ?></textarea>
                            <label for="message">Message</label>
                        </div>
                    </div>
                    <div class="row endButton">
                        <button class="btn waves-effect" type="submit">Send <i class="material-icons right">send</i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col hide-on-small-only m3 l2">
            <ul class="section table-of-contents">
                <li><a href="#contact">Contact</a></li>
                <li><a href="#write">Write Us</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>