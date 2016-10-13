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
        <h2 class="title">Complete the form to <?php echo $this->thing["title"] . " " . $this->thing["name"]; ?></h2>
    </div>
    <div class="row failed">
        <?php if ($this->error !== null) { echo $this->error; } ?>
    </div>
    <div class="row success">
        <?php if ($this->success !== null) { echo $this->success; } ?>
    </div>
    <form action="/admin/add/<?php echo $this->thing["slug"] ?>" method="post" class="row" enctype="multipart/form-data">
        <?php
        if ($this->thing["slug"] === "size") {
            $count = 0;
            foreach ($this->thing["label"][$_SESSION["lang"]] as $field) {
                ?>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">label</i>
                        <input id="<?php echo $this->thing["field"][$count] ?>" name="<?php echo $this->thing["field"][$count]; ?>" type="text" value="<?php echo $this->thing["value"][$this->thing["field"][$count]]; ?>">
                        <label for="<?php echo $this->thing["field"][$count]; ?>"><?php echo $field; ?></label>
                    </div>
                </div>
                <?php
                $count++;
            }
        } elseif ($this->thing["slug"] === "product") {
            ?>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">face</i>
                    <input id="frName" type="text" name="frName" value="<?php echo $this->thing["value"]["frName"]; ?>">
                    <label for="frName">Name in French</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">face</i>
                    <input id="enName" type="text" name="enName" value="<?php echo $this->thing["value"]["enName"]; ?>">
                    <label for="enName">Name in English</label>
                </div>
            </div>
            <?php
            foreach ($this->thing["product"] as $type => $array) {
                ?>
                <div class="row">
                    <div class="input-field col s12">
                        <select name="<?php echo $type; ?>[]" multiple>
                            <?php
                            foreach ($array as $id => $name) {
                                ?>
                                <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label><?php echo $this->thing["label"][$type][$_SESSION["lang"]]; ?></label>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="row">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Image</span>
                        <input type="file" name="img[]" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="frDescription" name="frDescription" class="materialize-textarea"><?php echo $this->thing["value"]["frDescription"]; ?></textarea>
                    <label for="frDescription">Description in French</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="enDescription" name="enDescription" class="materialize-textarea"><?php echo $this->thing["value"]["enDescription"]; ?></textarea>
                    <label for="enDescription">Description in English</label>
                </div>
            </div>
            <?php
        } else {
            foreach ($this->thing["field"] as $lang => $fieldLang) {
                ?>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">label</i>
                        <input id="<?php echo $fieldLang["name"]; ?>" name="<?php echo $fieldLang["name"]; ?>" type="text" value="<?php echo $this->thing["value"][$lang]; ?>">
                        <label for="<?php echo $fieldLang["name"]; ?>"><?php echo $this->thing["name"] . " " . $fieldLang["label"]; ?></label>
                    </div>
                </div>
                <?php
            }
        }
        ?>
        <div class="row endButton">
            <button class="btn waves-effect" type="submit">Add <?php echo $this->thing["name"]; ?></button>
        </div>
    </form>
</div>
</body>
</html>