<?php
namespace model;


class Product
{
    private $_id = null;
    private $_frName = "";
    private $_enName = "";
    private $_category = array();
    private $_material = array();
    private $_size = array();
    private $_usage = array();
    private $_frDescription = "";
    private $_enDescription = "";
    private $_img = array();

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return string
     */
    public function getFrName()
    {
        return $this->_frName;
    }

    /**
     * @return string
     */
    public function getEnName()
    {
        return $this->_enName;
    }

    /**
     * @return array
     */
    public function getCategory()
    {
        return $this->_category;
    }

    /**
     * @return string
     */
    public function getMaterial()
    {
        return $this->_material;
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->_size;
    }

    /**
     * @return string
     */
    public function getUsage()
    {
        return $this->_usage;
    }

    /**
     * @return string
     */
    public function getFrDescription()
    {
        return $this->_frDescription;
    }

    /**
     * @return string
     */
    public function getEnDescription()
    {
        return $this->_enDescription;
    }

    /**
     * @return array
     */
    public function getImg()
    {
        return $this->_img;
    }

    public function __construct($id = 0)
    {
        if ($id !== 0) {
            $bdd = new Bdd();
            $product = $bdd->select("product", array("*"), "id = $id")[0];
            $categories = explode("|", $product["idCategory"]);
            $materials = explode("|", $product["idMaterial"]);
            $sizes = explode("|", $product["idSize"]);
            $usages = explode("|", $product["idUsage"]);
            $this->_id = $product["id"];
            $this->_img = explode("|", $product["img"]);
            $fieldName = $_SESSION["lang"] . "Name";
            $this->_frName = $product["frName"];
            $this->_enName = $product["enName"];
            $this->_frDescription = $product["frDescription"];
            $this->_enDescription = $product["enDescription"];
            $array = array(
                "categories" => "_category",
                "materials" => "_material",
                "sizes" => "_size",
                "usages" => "_usage",
            );
            foreach ($array as $var => $field) {
                foreach ($$var as $id) {
                    if ($field === "_size") {
                        $arrayField = "name";
                        $select = $bdd->select(substr($field, 1), array("name"), "id = $id");
                    } else {
                        $arrayField = $fieldName;
                        $select = $bdd->select(substr($field, 1), array($fieldName), "id = $id");
                    }
                    $this->$field[] = $select[0][$arrayField];
                }
            }
        }
    }

    public function add($frName, $enName, array $category, array $material, array $size, array $usage, $frDescription, $enDescription, array $img)
    {
        $frName = addslashes($frName);
        $enName = addslashes($enName);
        $frDescription = addslashes($frDescription);
        $enDescription = addslashes($enDescription);
        $names = array("fr" => $frName, "en" => $enName);
        $return = array("return" => "", "error" => "");
        $message = new Message();
        $messages = $message->getMessages();
        $imgs = "";
        if (!empty($frName) && !empty($enName) && !empty($category)  && !empty($material) && !empty($size) && !empty($usage) && !empty($frDescription) && !empty($enDescription ) && !empty($img)) {
            $bdd = new Bdd();
            foreach ($img["error"] as $num => $error) {
                if ($error !== 0) {
                    $message["return"] = false;
                    return $message["error"] = sprintf($messages["error"]["uploadImg"], $img["name"][$num]);
                    break;
                }
                $imgs = $imgs . $img["name"][$num] . "|";
            }
            $categories = "";
            $materials = "";
            $sizes = "";
            $usages = "";
            foreach ($category as $value) {
                $categories = $categories . $value . "|";
            }
            foreach ($material as $value) {
                $materials = $materials . $value . "|";
            }
            foreach ($size as $value) {
                $sizes = $sizes . $value . "|";
            }
            foreach ($usage as $value) {
                $usages = $usages . $value . "|";
            }
            $categories = rtrim($categories, "|");
            $materials = rtrim($materials, "|");
            $sizes = rtrim($sizes, "|");
            $usages = rtrim($usages, "|");
            $arrayField = array(
                "frName" => $frName,
                "enName" => $enName,
                "idCategory" => $categories,
                "idMaterial" => $materials,
                "idSize" => $sizes,
                "idUsage" => $usages,
                "frDescription" => $frDescription,
                "enDescription" => $enDescription,
                "img" => ""
            );
            $add = $bdd->insert("product", $arrayField, true);
            if (!empty($add) && $add["execute"] === true) {
                $productPath = rtrim(__DIR__, "/") . "/../media/img/product/" . $add["lastId"] . "/";
                if (mkdir($productPath) && chmod($productPath, 0777)) {
                    foreach ($img["tmp_name"] as $num => $name) {
                        if(!rename($img["tmp_name"][$num], $productPath . $img["name"][$num])) {
                            $return["error"] = sprintf($messages["error"]["uploadImg"], $img["name"][$num]);
                            $return["return"] = false;
                            return $return;
                            break;
                        }
                    }
                    foreach ($img["name"] as $name) {
                        chmod($productPath . $name, 0777);
                    }
                    $update = $bdd->update("product", array("img" => rtrim($imgs, "|")), "id = " . $add["lastId"]);
                    if ($update) {
                        file_put_contents($productPath . "index.php", "<?php\n/**\n * Silence is gold\n */");
                        $return["return"] = true;
                        $return["error"] = "";
                        return $return;
                    } else {
                        $return["return"] = false;
                        $return["error"] = sprintf($messages["error"]["addProduct"], $names[$_SESSION["lang"]]);
                        return $return;
                    }
                } else {
                    $return["return"] = false;
                    $return["error"] = $messages["error"]["createFolder"];
                    return $return;
                }
            } else {
                $return["retun"] = false;
                $return["error"] = sprintf($messages["error"]["addProduct"], $names[$_SESSION["lang"]]);
                return $return;
            }
        } else {
            $return["retun"] = false;
            $return["error"] = $messages["error"]["emptyField"];
            return $return;
        }
    }

    public function update($frName, $enName, array $category, array $material, array $size, array $usage, $frDescription, $enDescription, array $oldImg, array $newImg) {
        $frName = addslashes($frName);
        $enName = addslashes($enName);
        $frDescription = addslashes($frDescription);
        $enDescription = addslashes($enDescription);
        $names = array("fr" => $frName, "en" => $enName);
        $return = array("return" => "", "error" => "");
        $message = new Message();
        $messages = $message->getMessages();
        $oldImgs = "";
        $newImgs = "";
        if (!empty($frName) && !empty($enName) && !empty($category)  && !empty($material) && !empty($size) && !empty($usage) && !empty($frDescription) && !empty($enDescription)) {
            $bdd = new Bdd();
            if (!empty($newImg)) {
                foreach ($newImg["error"] as $num => $error) {
                    if ($error !== 0) {
                        $message["return"] = false;
                        return $message["error"] = sprintf($messages["error"]["uploadImg"], $newImg["name"][$num]);
                        break;
                    }
                    $newImgs = $newImgs . $newImg["name"][$num] . "|";
                }
            }
            if (!empty($oldImg)) {
                foreach ($oldImg as $img) {
                    $oldImgs = $oldImgs . $img . "|";
                }
            }
            $categories = "";
            $materials = "";
            $sizes = "";
            $usages = "";
            foreach ($category as $value) {
                $categories = $categories . $value . "|";
            }
            foreach ($material as $value) {
                $materials = $materials . $value . "|";
            }
            foreach ($size as $value) {
                $sizes = $sizes . $value . "|";
            }
            foreach ($usage as $value) {
                $usages = $usages . $value . "|";
            }
            $categories = rtrim($categories, "|");
            $materials = rtrim($materials, "|");
            $sizes = rtrim($sizes, "|");
            $usages = rtrim($usages, "|");
            $arrayField = array(
                "frName" => $frName,
                "enName" => $enName,
                "idCategory" => $categories,
                "idMaterial" => $materials,
                "idSize" => $sizes,
                "idUsage" => $usages,
                "frDescription" => $frDescription,
                "enDescription" => $enDescription,
                "img" => rtrim($oldImgs, "|")
            );
            $id = $this->_id;
            $imgs = "";
            $imgs = $oldImgs . $newImgs;
            if (!empty($oldImgs) && empty($newImgs)) {
                $imgs = rtrim($oldImgs, '|');
            }
            if (empty($oldImgs) && !empty($newImgs)) {
                $imgs = rtrim($newImgs, '|');
            }
            if (!empty($oldImgs) && !empty($newImgs)) {
                $imgs = $oldImgs . rtrim($newImgs, '|');
            }
            $updateProduct = $bdd->update('product', $arrayField, "id = $id");
            if ($updateProduct === true) {
                $productPath = rtrim(__DIR__, "/") . "/../media/img/product/" . $id . "/";
                foreach ($newImg["tmp_name"] as $num => $name) {
                    if(!rename($newImg["tmp_name"][$num], $productPath . $newImg["name"][$num])) {
                        $return["error"] = sprintf($messages["error"]["uploadImg"], $newImg["name"][$num]);
                        $return["return"] = false;
                        return $return;
                        break;
                    }
                }
                foreach ($newImg["name"] as $name) {
                    chmod($productPath . $name, 0777);
                }
                $update = $bdd->update("product", array("img" => $imgs), "id = " . $id);
                if ($update) {
                    $return["return"] = true;
                    $return["error"] = "";
                    return $return;
                } else {
                    $return["return"] = false;
                    $return["error"] = sprintf($messages["error"]["updateProduct"], $names[$_SESSION["lang"]]);
                    return $return;
                }
            } else {
                $return["retun"] = false;
                $return["error"] = sprintf($messages["error"]["updateProduct"], $names[$_SESSION["lang"]]);
                return $return;
            }
        } else {
            $return["retun"] = false;
            $return["error"] = $messages["error"]["emptyField"];
            return $return;
        }
    }
}