<?php

namespace controller;

use model\Bdd;
use model\Config;
use model\Form;
use model\Mail;
use model\Message;
use model\Product;
use model\View;

class SiteController
{
    public function checkMaintenance($page, array $array = array())
    {
        $config = new Config();
        if ($config->getMaintenance() === "true") {
            $view = new View("site#maintenance");
            $view->render();
        } else {
            $view = new View($page);
            if (!empty($array)) {
                foreach ($array as $item => $value) {
                    $view->set($item, $value);
                }
            }
            $view->render();
        }
    }

    public function index()
    {
        $this->checkMaintenance("site#index");
    }

    public function cini()
    {
        $this->checkMaintenance("site#cini");
    }

    public function contact()
    {
        $this->checkMaintenance("site#contact");
    }

    public function categories()
    {
        $bdd = new Bdd();
        $categoriesArray = $bdd->select("category", array("*"));
        $categories = array();
        $productCount = array();
        $productIdImg = array();
        $field = $_SESSION["lang"] . "Name";
        foreach ($categoriesArray as $category) {
            $productCount = $bdd->select("product", array("COUNT(id)"), "idCategory LIKE '%" . $category["id"] . "%'");
            $productIdImg[$category[$field]] = $bdd->select("product", array("id", "img"), "idCategory LIKE '%" . $category["id"] . "%'", null, "LIMIT 1");
            $categories[$category[$field]]["slug"] = $category["slug"];
            if (!empty($productCount)) {
                $categories[$category[$field]]["count"] = $productCount[0]["COUNT(id)"];
            }
            if (!empty($productIdImg)) {
                $img = explode("|", $productIdImg[$category[$field]][0]["img"]);
                $categories[$category[$field]]["img"] = $img[0];
                $categories[$category[$field]]["id"] = $productIdImg[$category[$field]][0]["id"];
            }
        }
        $this->checkMaintenance("site#products", array("categoriesMaterialsProducts" => $categories, "func" => "categories"));
    }

    public function materials($category)
    {
        $bdd = new Bdd();
        $id = $bdd->select("category", array("id"), "slug = '" . $category . "'");
        if (!empty($id)) {
            $idCategory = $id[0]["id"];
            $slug = $bdd->select("category", array("slug"), "id = $idCategory")[0]["slug"];
            $materialArray = $bdd->select("material", array("*"));
            $materialsArray = array();
            $field = $_SESSION["lang"] . "Name";
            if (!empty($materialArray)) {
                foreach ($materialArray as $array) {
                    $materialsArray[$array["id"]] = array("name" => $array[$field], "slug" => $array["slug"]);
                }
            }
            $materials = array();
            foreach ($materialsArray as $idMaterial => $array) {
                $materials[$array["name"]]["count"] = $bdd->select("product", array("COUNT(id)"), "idCategory LIKE  '%" . $idCategory . "%' AND idMaterial LIKE '%" . $idMaterial . "%'")[0]["COUNT(id)"];
                $materials[$array["name"]]["id"] = $idMaterial;
                $materials[$array["name"]]["slug"] = $array["slug"];
                $materials[$array["name"]]["categorySlug"] = $slug;
            }
            foreach ($materials as $material => $array) {
                $product = $bdd->select("product", array("id", "img"), "idCategory LIKE '%" . $idCategory . "%' AND idMaterial LIKE '%" . $array["id"] . "%'", array(), "LIMIT 1");
                if (!empty($product)) {
                    $img = explode("|", $product[0]["img"])[0];
                    $materials[$material]["product"] = array("id" => $product[0]["id"], "img" => $img);
                }
            }
            $this->checkMaintenance("site#products", array("categoriesMaterialsProducts" => $materials, "func" => "materials"));
        } else {
            $this->categories();
        }
    }

    public function products($category, $material)
    {
        $bdd = new Bdd();
        $idCat = $bdd->select("category", array("id"), "slug = '" . $category . "'");
        $idMat = $bdd->select("material", array("id"), "slug = '" . $material . "'");
        if (!empty($idCat) && !empty($idMat)) {
            $idCategory = $idCat[0]["id"];
            $idMaterial = $idMat[0]["id"];
            $field = $_SESSION["lang"] . "Name";
            $products = array();
            $where = "idCategory LIKE '%" . $idCategory . "%' AND idMaterial LIKE '%" . $idMaterial . "%'";
            $productsArray = $bdd->select("product", array("id", "img", $field), $where);
            foreach ($productsArray as $array) {
                $img = explode("|", $array["img"])[0];
                $products[] = array("id" => $array["id"], "img" => $img, "name" => $array[$field]);
            }
            $this->checkMaintenance("site#products", array("categoriesMaterialsProducts" => $products, "func" => "products"));
        } else {
            $this->categories();
        }
    }

    public function product($id, $error = null, $success = null, array $array = array())
    {
        $productClass = new Product($id);
        if (!is_null($productClass->getId())) {
            $funcName = "get" . ucfirst($_SESSION["lang"]) . "Name";
            $funcDescription = "get" . ucfirst($_SESSION["lang"]) . "Description";
            $product = array();
            $product["id"] = $productClass->getId();
            $product["name"] = stripslashes($productClass->$funcName());
            $product["material"] = $productClass->getMaterial();
            $product["size"] = $productClass->getSize();
            $product["usage"] = $productClass->getUsage();
            $product["img"] = $productClass->getImg();
            $this->checkMaintenance("site#product", array("product" => $product, "error" => $error, "success" => $success, "array" => $array));
        } else {
            $this->categories();
        }
    }

    public function sendMessage()
    {
        $view = new View("site#contact");
        $mail = new Mail();
        $form = new Form();
        $message = new Message();
        $messages = $message->getMessages();
        foreach ($_POST as $field => $value) {
            if (empty($value)) {
                $view->set($field, $value);
                $view->set("error", $messages["error"]["emptyField"]);
                $view->render();
                return;
                break;
            }
        }
        $sendMail = $mail->sendMail($_POST["name"], $_POST["email"], $_POST["tel"], $_POST["message"]);
        $add = $form->add("contact", $_POST["name"], $_POST["email"], $_POST["tel"], $_POST["message"]);
        if ($sendMail["return"] == true && $add["return"] == true) {
            $view->set("success", $messages["success"]["addForm"]);
        } else {
            foreach ($_POST as $field => $value) {
                $view->set($field, $value);
            }
            $view->set("error", $sendMail["error"]);
        }
        $view->render();
    }

    public function sendDevis($id)
    {
        $error = null;
        $success = null;
        $mail = new Mail();
        $form = new Form();
        $message = new Message();
        $messages = $message->getMessages();
        $array = array();
        foreach ($_POST as $field => $value) {
            if (empty($value)) {
                $array[$field] = $value;
                break;
            }
        }
        if (empty($array)) {
            $sendMail = $mail->sendMail($_POST["name"], $_POST["email"], $_POST["tel"], $_POST["message"]);
            $add = $form->add($_POST["name"], $_POST["email"], $_POST["tel"], $_POST["message"], $id);
            if ($sendMail["error"] === "" && $add["error"] === "") {
                $success = $messages["success"]["addForm"];
            } else {
                foreach ($_POST as $field => $value) {
                    $array[$field] = $value;
                }
                $error = $add["error"];
            }
        } else {
            foreach ($_POST as $field => $value) {
                $array[$field] = $value;
                $error = $messages["error"]["emptyField"];
            }
        }
        $this->product($id, $error, $success, $array);
    }

    public function switchLanguage()
    {
        $lang = $_POST["language"];
        $currentLang = $_SESSION["lang"];
        if ($lang !== $currentLang) {
            $_SESSION["lang"] = $lang;
            sleep(1);
            echo "true";
        } else {
            echo "false";
        }
    }
}